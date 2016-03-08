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
 * @Table(name="user_role")
 * @UniqueEntity("label")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="entity_name", type="string")
 *
 */
class UserRole
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
     * @var text $label
     *
     * @Column(name="label", type="string", length=60, nullable=false)
     */
    protected $label;

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
     * @return text $label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
        SETTERS
    */

    /**
     * @param text $label
     */
    public function setLabel($value)
    {
        $this->label = $value;
    }
}
