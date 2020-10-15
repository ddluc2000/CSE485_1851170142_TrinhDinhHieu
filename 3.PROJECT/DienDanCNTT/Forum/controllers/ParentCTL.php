<?php
require_once 'models/ZoneModel.php';
class ParentCTL
{
  public function index()
  {
    //controller gọi model, model sẽ truy vấn dữ liệu và trả về cho controller
    //khởi tạo model book
    $zoneModel = new ZoneModel();
    $zones = $zoneModel->selectAll();
    //import file view tương ứng, xử lý biến $books tại view này
    require_once 'views/home.php';
  }
}

?>