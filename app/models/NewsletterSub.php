<?php
/**
 * @Entity
 * @Table(name="newsletter_subs")
 *
 */

class NewsletterSub
{
    /**
        FIELDS
    **/

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var String $email
     *
     * @Column(name="email", type="string", length=255, nullable=false)
     */
    public $email;

    /**
     * @var DateTime $created_at
     *
     * @Column(name="created_at", type="datetime", nullable=false)
     */
    public $created_at;
}
