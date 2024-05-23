<?

namespace App\Repository\RepositoryMain;

use App\Models\OrderItems;
use App\Repository\RepositoryMain\BaseRepository;

class OrderItemsRepository extends BaseRepository
{
    protected $modalOrderItems;
    function __construct()
    {
        $this->modalOrderItems = new OrderItems();
    }
    function create($value, $options = [])
    {
    }
    function update($id, $value, $options = [])
    {
    }
    function delete($value, $options = [])
    {
    }
    function details($id, $option = null)
    {
    }
    function all($options)
    {
    }
}
