<?php
/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2014 Toast Games <http://toast-games.com>
 * @version    Biskot 0.2
 */

/**
 * @Entity
 * @Table(name="user")
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="entity_name", type="string")
 *
 */
class User
{
    /**
        FIELDS
    */

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var UserRole $role
     *
     * @ManyToOne(targetEntity="UserRole", inversedBy="users")
     * @JoinColumn(name="role_id", referencedColumnName="id")
     */
    protected $role;

    /**
     * @var text $username
     *
     * @Column(name="username", type="string", length=255, nullable=false)
     */
    protected $username;

    /**
     * @var text $username_slug
     *
     * @Column(name="username_slug", type="string", length=255, nullable=false)
     */
    private $username_slug;

    /**
     * @var text $password
     *
     * @Column(name="password", type="string", length=255, nullable=false)
     */
    protected $password;

    /**
     * @var text $email
     *
     * @Column(name="email", type="string", length=255, nullable=false)
     */
    protected $email;

    /**
     * @var smallint $is_activated
     *
     * @Column(name="is_activated", type="smallint", length=1, nullable=true, options={"default" = 1})
     */
    protected $is_activated;

    /**
     * @var text $salt
     *
     * @Column(name="salt", type="string", length=15, nullable=false)
     */
    protected $salt;

    /**
     * @var datetime $created_at
     *
     * @Column(name="created_at", type="datetime", nullable=false)
     */
    protected $created_at;

    /**
     * @var datetime $blocked_at
     *
     * @Column(name="blocked_at", type="datetime", nullable=true)
     */
    protected $blocked_at;

    /**
     * @var datetime $password_resetted_at
     *
     * @Column(name="password_resetted_at", type="datetime", nullable=true)
     */
    protected $password_resetted_at;


    /**
        GETTERS
    */

    /**
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return text $username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return text $username_slug
     */
    public function getUsernameSlug()
    {
        return $this->username_slug;
    }

    /**
     * @return text $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return text $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return smallint $is_activated
     */
    public function getIsActivated()
    {
        return $this->is_activated;
    }

    /**
     * @return text $salt
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @return datetime $created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return datetime $password_resetted_at
     */
    public function getPasswordResettedAt()
    {
        return $this->password_resetted_at;
    }

    /**
     * @return datetime $blocked_at
     */
    public function getBlockedAt()
    {
        return $this->blocked_at;
    }

    /**
     * @return Role $role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
        SETTERS
    */

    /**
     * @param text $value
     */
    public function setUsername($value)
    {
        $this->username = $value;
    }

    /**
     * @param text $value
     */
    public function setUsernameSlug($value)
    {
        $this->username_slug = $value;
    }

    /**
     * @param text $value
     */
    public function setPassword($value)
    {
        $this->password = $value;
    }

    /**
     * @param text $value
     */
    public function setEmail($value)
    {
        $this->email = $value;
    }

    /**
     * @param integer $value
     */
    public function setIsActivated($value)
    {
        $this->is_activated = $value;
    }

    /**
     * @param text $value
     */
    public function setSalt($value)
    {
        $this->salt = $value;
    }

    /**
     * @param text $value
     */
    public function setCreatedAt($value)
    {
        $this->created_at = $value;
    }

    /**
     * @param datetime $value
     */
    public function setPasswordResettedAt($value)
    {
        $this->password_resetted_at = $value;
    }

    /**
     * @param Role $value
     */
    public function setRole($value)
    {
        $this->role = $value;
    }

    /**
     * @param datetime $value
     */
    public function setBlockedAt($value)
    {
        $this->blocked_at = $value;
    }

    /**
        FUNCTIONS
    **/

    /**
     * @return boolean
     */
    public function isAdmin()
    {
        return ($this->getRole()->getId() == _USER_ROLE_ADMIN_);
    }
}
