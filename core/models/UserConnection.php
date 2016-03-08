<?php
/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2014 Toast Games <http://toast-games.com>
 * @version    Biskot 0.2
 */

/**
 * @Entity(repositoryClass="UserConnectionRepository")
 * @Table(name="user_connection")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="entity_name", type="string")
 *
 */
class UserConnection
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
     * @var User $user
     *
     * @ManyToOne(targetEntity="User", inversedBy="userConnections")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var text $browser
     *
     * @Column(name="browser", type="string", length=255, nullable=false)
     */
    private $browser;

    /**
     * @var text $token
     *
     * @Column(name="token", type="string", length=15, nullable=true)
     */
    private $token;

    /**
     * @var datetime $created_at
     *
     * @Column(name="created_at", type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @var tinyint $result
     *
     * @Column(name="result", type="string", nullable=false)
     */
    private $result;

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
     * @return User $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return text $browser
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * @return text $token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return datetime $created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return tinyint $result
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
        SETTERS
    */

    /**
     * @param User $value
     */
    public function setUser($value)
    {
        $this->user = $value;
    }

    /**
     * @param text $value
     */
    public function setBrowser($value)
    {
        $this->browser = $value;
    }

    /**
     * @param text $value
     */
    public function setToken($value)
    {
        $this->token = $value;
    }

    /**
     * @param datetime $value
     */
    public function setCreatedAt($value)
    {
        $this->created_at = $value;
    }

    /**
     * @param integer $value
     */
    public function setResult($value)
    {
        $this->result = $value;
    }
}
