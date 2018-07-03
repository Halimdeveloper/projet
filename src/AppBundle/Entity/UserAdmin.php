<?

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserAdmin
 * 
 * @package AppBundle\Entity
 * 
 * @ORM\Entity
 * 
 * @ORM\Table(name="user_admin")
 * 
 */
class UserAdmin extends BaseUser
{
    /**
     * @var integer
     * 
     * @ORM\Id
     * 
     * @ORM\GeneratedValue(Strategy="AUTO")
     * 
     */
    protected $id;

    public function __construct()
    {
        parent::_construct();
    }

}

