<?php


include_once('../conexao_db/conexao.php');
$conexao->exec("set names utf8");

$RECEIVED_DATA = json_decode(file_get_contents("php://input"));
$data = array();

if($RECEIVED_DATA->action == 'salvarAgendamento')
{ 
 $data = array(
  ':name' => $RECEIVED_DATA->name, 
  ':cpf' => $RECEIVED_DATA->cpf,
  ':source_id' => $RECEIVED_DATA->source_id,
  ':birthdate' => $RECEIVED_DATA->birthdate,
  ':professional_id' => $RECEIVED_DATA->professional_id,
  ':specialty_id' => $RECEIVED_DATA->specialty_id
 );

 try{
    $query = "INSERT INTO `agendamento` ( name,cpf,source_id,birthdate,professional_id,specialty_id) VALUES (:name,:cpf,:source_id,:birthdate,:professional_id,:specialty_id) ";

    $statement = $conexao->prepare($query);
    $statement->execute($data);
   
    $output = array(
     'msg' => 'Dados Inseridos'
    );
 }catch (Throwable $e) {
   
    $output = array (
     'msg'=>  'Aconteceu algum erro, tente novamente'
    );

}finally{
    echo json_encode($output);
 }
 


} 



if($RECEIVED_DATA->action == 'selectAgendamentos')
{
 $query = "SELECT * FROM agendamento ";
 $statement = $conexao->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}  