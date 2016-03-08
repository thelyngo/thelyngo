<?php
/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2014 Toast Games <http://toast-games.com>
 * @version    Biskot 0.2
 */

use Doctrine\ORM\EntityRepository;

class UserConnectionRepository extends EntityRepository
{
    public function findOneByBruteforcing($user)
    {
        $limit = new DateTime();
        $limit->sub(new DateInterval('PT1H'));

        $em = $this->getEntityManager();

        $q = $em->createQuery("
            SELECT COUNT(uc) AS nbConnection
            FROM UserConnection uc
            WHERE uc.user = " . $user->getId() . "
            AND uc.created_at BETWEEN '".$limit->format('Y-m-d H:i:s')."' AND CURRENT_TIMESTAMP()
            AND uc.result = '0'");

        $res = $q->getResult();

        if ($res && $res[0]['nbConnection'] >= 5)
            return true;
        else
            return false;
    }
}
?>
