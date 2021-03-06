<?php defined('BASEPATH' OR exit('No direct script access allowed'));

class cApi extends CI_Controller {

  function __construct(){
          parent::__construct();
  }

//register API
  public function createForm(){
    $csrf = array(
         'name' => $this->security->get_csrf_token_name(),
         'hash' => $this->security->get_csrf_hash()
     );

    $this->load->view('vApiForm');
  }

//delete user API using userID
  public function delete($customerID){
    Redirect("https://kunanonapi.000webhostapp.com/delete?CustID=$customerID");
  }

//show userlist API
  public function customerRead(){
    $data ="";
    $data_string = json_encode($data);
    $CallAPI = 'https://kunanonapi.000webhostapp.com/read';
    $ch = curl_init($CallAPI);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    $result = curl_exec($ch);
    curl_close($ch);
    $json=json_decode($result,true);
    $nRows = count($json);

    echo $nRows;
    echo "<table><tr>";
    echo "<th>customerID</th>
          <th>firstname</th>
          <th>lastname</th>
          <th>lastname</th>
          </tr>";
    echo "<tr>";
    for($i = 0; $i< $nRows; $i++){
    $custID = $json[$i]['CustomerID'];
    $custName = $json[$i]['CustomerFirstname'];
    $custLast = $json[$i]['CustomerLastname'];
    echo "<td>$custID</td>
          <td>$custName</td>
          <td>$custLast</td>";
    echo "</tr>";
    }
  }
}

?>
