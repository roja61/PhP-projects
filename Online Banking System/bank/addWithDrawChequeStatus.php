<?php

session_start();
include_once 'mysql.php';

if (isset($_POST) && !empty($_POST)) {

    $strSQL1 = "SELECT * FROM customers where account_num='" . $_POST["account_num"] . "' and UPPER(firstname)='" . strtoupper($_POST["firstname"]) . "' and UPPER(lastname)='" . strtoupper($_POST["lastname"]) . "'";
    $rs1 = mysql_query($strSQL1);

    if (mysql_num_rows($rs1) == 0) {
        header('Location: addWithdrawCheque.php?s=1&st=You Entered Wrong Recipient Details.');
        exit(0);
    } else {
        $row = mysql_fetch_array($rs1);

        if ($row['id'] == $_SESSION['customerId']) {
            header('Location: addWithdrawCheque.php?s=1&st=You Provided Your Personal Cheque to add recipient.It is not Allowed.');
            exit(0);
        } else {
            $strSQL2 = "SELECT * FROM transactions where cheque_num='" . $_POST["cheque_num"] . "'";
            $rs2 = mysql_query($strSQL2);

            if (mysql_fetch_array($rs2) > 1) {
                header('Location: addWithdrawCheque.php?s=1&st=Already Transaction Exists with this Cheque Number.');
                exit(0);
            } else {
                $strSQL3 = "SELECT * FROM chequebooks where (book_start_num>='" . $_POST["account_num"] . "' and book_end_num<='" . $_POST["account_num"] . "') and customer_id='" . $row["id"] . "'";
                $rs3 = mysql_query($strSQL3);

                if (mysql_fetch_array($rs2) > 1) {
                    header('Location: addWithdrawCheque.php?s=1&st=Invalid Cheque Details Provided.');
                    exit(0);
                } else {

                    $strSQL4 = "SELECT sum(amount) as deposit_amount from transactions where ((deposit_withdraw_transfer='Deposit' and custmer_id='" . $row['id'] . "') or (deposit_withdraw_transfer='Transfer' and to_cust_id='" . $row['id'] . "'))";
                    $rs4 = mysql_query($strSQL4);
                    $row4 = mysql_fetch_array($rs4);

                    $strSQL5 = "SELECT sum(amount) as withdraw_amount from transactions where  ((deposit_withdraw_transfer='WithDraw'  and custmer_id='" .$row['id']. "') or (deposit_withdraw_transfer='Transfer' and from_cust_id='" .$row['id'] . "') or (deposit_withdraw_transfer='Deposit' and from_cust_id='" . $row['id'] . "'))";
                    $rs5 = mysql_query($strSQL5);
                    $row5 = mysql_fetch_array($rs5);
                    $balance = $row4['deposit_amount'] - $row5['withdraw_amount'];

                    if ($balance >= $_POST["amount"]) {
                        $sql = "INSERT INTO transactions (custmer_id,deposit_withdraw_transfer,cash_cheque,amount,transaction_date,cheque_num,to_cust_id,from_cust_id,transaction_description)
VALUES ('" . $_SESSION["customerId"] . "','Deposit','Cheque','" . $_POST["amount"] . "','" . date('Y-m-d H:i:s', time()) . "','" . $_POST["cheque_num"] . "','" . $_SESSION["customerId"] . "','" . $row["id"] . "','" . $_POST["transaction_description"] . "')";
                        $rs = mysql_query($sql, $conn);
                        
                        
                        header('Location: customerTransactions.php?s=1&st=Cheque Deducted Succesfully');
                    } else {
                        header('Location: addWithdrawCheque.php?s=1&st=Insufficient Funds.');
                        exit(0);
                    }
                }
            }
        }
    }
}







