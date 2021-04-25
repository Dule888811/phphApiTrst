<?php
header("Content-Type: application/json; charset=UTF-8");
require 'core/init.php';


class Card
{
    public $id;
    public $first_name;
    public $last_name;
    public $address;
    public $city;
    public $currency;
    public $balance;
    public $pin;
    public $country_id;
    public $status;
    public $phone;
    public $transaction;
    public $created_at;

    public function GetAllCards()
    {

        $cards = [];
        $pdo = Connect::getInstance();
        $data = $pdo->prepare('SELECT * FROM api.cards');
        $data->execute();
        while($OutPutData = $data->fetch(PDO::FETCH_ASSOC))
        {
            $cards[$OutPutData['id']] = array(
                'id' => $OutPutData['id'],
                'first_name' => $OutPutData['first_name'],
                'last_name' => $OutPutData['last_name'],
                'address' => $OutPutData['address'],
                'city' => $OutPutData['city'],
                'currency' => $OutPutData['currency'],
                'balance' => $OutPutData['balance'],
                'pin' => $OutPutData['pin'],
                'status' => $OutPutData['status'],
                'transaction' => $OutPutData['transaction'],
                'created_at' => $OutPutData['created_at'],
            );
        }
        return json_encode($cards, JSON_PRETTY_PRINT);
    }
    public function GetCardsById($id)
{

    $id= $_GET['cards'];
    $pdo = Connect::getInstance();
    $data =$pdo->prepare("SELECT * FROM api.cards  WHERE id =? ");
    $data->bindValue(1,$id);
    $data->execute();
    $card = $data->fetch(PDO::FETCH_ASSOC);

    return  json_encode($card);
}

public function GetBalanceCard($id)
{
    $card = $this->GetCardsById($id);
    $card = json_decode($card);
    $balance = $card->balance;
    echo  json_encode($balance);
}

    public function GetPinCard($id)
    {
        $card = $this->GetCardsById($id);
        $card = json_decode($card);
        $pin = $card->pin;
        echo  json_encode($pin);
    }

    public function GetHistoryTransactionCard($id,$startTime)
{
    $pdo = Connect::getInstance();
    $transaction = [];
    $data =$pdo->prepare("SELECT * FROM api.transactions INNER  JOIN api.cards ON transactions.card_id=cards.id  WHERE {$startTime} < api.transactions.created_at   AND api.transactions.card_id={$id}");
    $data->execute();
    while($OutPutData = $data->fetch(PDO::FETCH_ASSOC))
    {
        $transaction[$OutPutData['id']] = array(
            'id' => $OutPutData['id'],
            'card_id' => $OutPutData['card_id'],
            'amount' => $OutPutData['amount'],
        );
    }
    echo  json_encode($transaction,JSON_PRETTY_PRINT);
}

public function create($country_id,$first_name,$last_name,$address,$city,$pin,$currency,$balance,$phone,$status,$transaction)
{
    $pdo = Connect::getInstance();
    $query =$pdo->prepare("INSERT INTO api.cards VALUES ($country_id,$first_name,$last_name,$address,$city,$pin,$currency,$balance,$phone,$status,$transaction) VALUES (:country_id,:first_name,:address,:city,:pin,:currency.:balance,:phone,:status,:transaction)");

    $query->bindParam(':country_id' , $country_id, PDO::PARAM_STR);
    $query->bindParam(':first_name',$first_name,PDO::PARAM_STR);
    $query->bindParam(':last_name',$last_name,PDO::PARAM_STR);
    $query->bindParam(':address',$address,PDO::PARAM_STR);
    $query->bindParam(':city',$city,PDO::PARAM_STR);
    $query->bindParam(':pin',$pin,PDO::PARAM_STR);
    $query->bindParam(':currency',$currency,PDO::PARAM_STR);
    $query->bindParam(':balance',$balance,PDO::PARAM_STR);
    $query->bindParam(':phone',$phone,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':transaction',$transaction,PDO::PARAM_STR);

    if($query->execute()){
        return true;
    }else{
        return false;
    }
}

    public function DeactivateCard($id)
    {
        $pdo = Connect::getInstance();
        $sql = "UPDATE api.cards SET status='false' WHERE id=?";
        $data =$pdo->prepare($sql );
        $data->bindValue(1,$id);
        $data->execute();

    }

    public function ActivateCard($id)
    {
        $pdo = Connect::getInstance();
        $sql = "UPDATE api.cards SET status='true' WHERE id=?";
        $data =$pdo->prepare($sql );
        $data->bindValue(1,$id);
        $data->execute();

    }
     public function UodatePin($id,$pin)
     {
         $pdo = Connect::getInstance();
         $sql = "UPDATE api.cards SET pin=? WHERE id=?";
         $data =$pdo->prepare($sql );
         $data->bindValue(1,$pin);
         $data->bindValue(2,$id);
         $data->execute();
     }

}