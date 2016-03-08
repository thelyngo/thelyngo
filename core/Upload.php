<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

class Upload
{
    /**
     * Return upload object
     *
     * @param array $file
     * @return Upload
     */
    public static function initNew($file)
    {
        return new Upload($file);
    }

    /**
     * Default directory persmissions (destination dir)
     */
    protected $default_permissions = 750;

    /**
     * Destination directory
     *
     * @var string
     */
    protected $destination;

    /**
     * Fileinfo
     *
     * @var object
     */
    protected $finfo;

    /**
     * Data about file
     *
     * @var array
     */
    public $file = array();

    /**
     * Max. file size
     *
     * @var int
     */
    protected $max_file_size;

    /**
     * Allowed mime types
     *
     * @var array
     */
    protected $mimes = array();

    /**
     * External callback methods
     *
     * @var array
     */
    protected $external_callback_methods = array();

    /**
     * Temp path
     *
     * @var string
     */
    protected $tmp_name;

    /**
     * Validation errors
     *
     * @var array
     */
    protected $validation_errors = array();

    /**
     * Filename (new)
     *
     * @var string
     */
    protected $filename;

    /**
     *  Define destination path and init the file informations
     *
     * @param array $file
     */
    public function __construct($file = null)
    {
        $this->destination = _UPLOAD_DIR_;

        // set & create destination path
        if (!$this->setDestination())
        {
            throw new Exception('Upload: Can\'t create destination. '.$this->destination);
        }

        //checks whether file array is valid
        if (!$this->checkFileArray($file))
        {
            //file not selected or some bigger problems (broken files array)
            $this->validation_errors[] = 'Please select file.';
        }

        //set file name by default
        $this->filename = $file['name'];

        //set file data
        $this->file_post = $file;

        //set tmp path
        $this->tmp_name = $file['tmp_name'];

        //create finfo object
        $this->finfo = new finfo();
    }

    /**
        setters methods
    */

    /**
     * Set destination path (return TRUE on success)
     *
     * @return bool
     */
    protected function setDestination()
    {
        return is_writable($this->destination) ?: mkdir($this->destination, $this->default_permissions, true);
    }

    /**
     * Set target filename
     *
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Set allowed mime types
     *
     * @param array $mimes
     */
    public function setMimes($mimes)
    {
        $this->mimes = $mimes;

        //if mime types is set -> set callback
        $this->callbacks[] = 'checkMimeType';
    }

    /**
     * Set max. file size
     *
     * @param int $size
     */
    public function setMaxSize($size)
    {
        $this->max_file_size = $size;

        //if max file size is set -> set callback
        $this->callbacks[] = 'checkFileSize';
    }

    /**
     * Set data about file
     */
    protected function setFileData()
    {
        $file_size = filesize($this->tmp_name);

        $this->file = array(
            'status'                => false,
            'destination'           => $this->destination,
            'size_in_bytes'         => $file_size,
            'size_in_mb'            => $this->bytesToMb($file_size),
            'mime'                  => $this->finfo->file($this->tmp_name, FILEINFO_MIME_TYPE),
            'original_filename'     => $this->file_post['name'],
            'tmp_name'              => $this->file_post['tmp_name'],
            'post_data'             => $this->file_post,
        );
    }

    /**
        upload management methods
    */

    /**
     * Check & Save file
     *
     * Return data about current upload
     *
     * @return array
     */
    public function upload()
    {
        if ($this->check())
            $this->save();

        // return state data
        return $this->file;
    }

    /**
     * Validate file (execute callbacks)
     *
     * Returns TRUE if validation successful
     *
     * @return bool
     */
    public function check()
    {
        //execute callbacks (check filesize, mime, also external callbacks
        $this->validate();

        //check if another file with same filename already exists
        if (file_exists($this->destination.$this->filename))
            $this->validation_errors[] = 'Upload: Can\'t upload file, same file name exists.';

        //add error messages
        $this->file['errors'] = $this->validation_errors;

        //change file validation status
        $this->file['status'] = empty($this->validation_errors);

        return $this->file['status'];
    }

    /**
     * Execute callbacks
     */
    protected function validate()
    {
        if (empty($this->validation_errors))
        {
            //set data about current file
            $this->setFileData();

            //execute internal callbacks
            $this->executeCallbacks($this->callbacks, $this);
        }
    }

    /**
     * Save file on server
     *
     * Return state data
     *
     * @return array
     */
    public function save()
    {
        //create & set new filename
        $this->createNewFilename();

        //set filename
        $this->file['filename'] = $this->filename;

        //set full path
        $this->file['path'] = $this->destination.$this->filename;

        $status = move_uploaded_file($this->tmp_name, $this->file['path']);

        //checks whether upload successful
        if (!$status)
            throw new Exception('Upload: Can\'t upload file.');

        //done
        $this->file['status'] = true;
    }

    /**
     * Execute callbacks
     */
    protected function executeCallbacks($callbacks, $object)
    {
        foreach($callbacks as $method)
            $object->$method($this);
    }

    /**
        checks methods
    */

    /**
     * File size validation callback
     *
     * @param object $object
     */
    protected function checkFileSize($object)
    {
        if (!empty($object->max_file_size))
        {
            $file_size_in_mb = $this->bytesToMb($object->file['size_in_bytes']);

            if ($object->max_file_size <= $file_size_in_mb)
                $object->validation_errors[] = 'File is too big.';
        }

    }

    /**
     * File mime type validation callback
     *
     * @param obejct $object
     */
    protected function checkMimeType($object)
    {
        if (!empty($object->mimes))
            if (!in_array($object->file['mime'], $object->mimes))
                $object->validation_errors[] = 'Mime type not allowed.';
    }

    /**
     * Checks whether Files post array is valid
     *
     * @return bool
     */
    protected function checkFileArray($file)
    {
        return isset($file['error'])
            && !empty($file['name'])
            && !empty($file['type'])
            && !empty($file['tmp_name'])
            && !empty($file['size']);
    }

    /**
        utility methods
    */

    /**
     * Set unique filename
     *
     * @return string
     */
    protected function createNewFilename()
    {
        $filename = substr(sha1(mt_rand(1, 9999) . $this->destination . uniqid()) . time(), 0, 10) .'_'. $this->filename;

        $this->setFilename($filename);
    }

    /**
     * Convert bytes to mb.
     *
     * @param int $bytes
     * @return int
     */
    protected function bytesToMb($bytes)
    {
        return round(($bytes / 1048576), 2);
    }

}
