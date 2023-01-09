<?php

class sums extends database
{
    public function sum($table, $rowsum, $target, $conjunction = '', $order = [], $limit = '')
    {
        if (is_array($order)) {
        } else {
            $order = [$order];
        }

        $kof = '';
        if ($order != []) {
            foreach ($order as $key => $value) {
                $kof .= "ORDER BY $key $value";
            }
        } else {
            $kof = '';
        }
        $vs = '';
        // $allval = []
        foreach ($target as $value) {
            if (is_array($value)) {
                if (count($value) == 3) {
                    $colunmname = $value[0];
                    $operator = $value[1];
                    $colunmvalue = $value[2];
                    if ($vs == '') {
                        $vs .= 'WHERE '.$colunmname.' '.$operator.' :'.$colunmname;
                    } else {
                        $vs .= " $conjunction $colunmname $operator :$colunmname";
                    }
                }
            }
        }
        // echo "SELECT * FROM $table $vs $limit";
        // $vs = rtrim($vs, $conjunction);
        // echo $vs;
        if ($limit == '') {
            $sel = $this->conn->prepare("SELECT SUM(rowsum) as totCost FROM $table $vs $kof ");
        } else {
            $sel = $this->conn->prepare("SELECT SUM(rowsum) as totCost FROM $table $vs $kof LIMIT $limit");
        }
        foreach ($target as $value) {
            if (is_array($value)) {
                if (count($value) == 3) {
                    $sel->bindValue(':'.$value[0], $value[2]);
                }
            }
        }
        try {
            $sel->execute();

            $result = $sel->fetch(PDO::FETCH_ASSOC);
             return $result['totCost'];
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function sumall($table, $rowsum, $order = [], $limit = '')
    {
        if (is_array($order)) {
        } else {
            $order = [$order];
        }
        $kof = '';
        if ($order != []) {
            foreach ($order as $key => $value) {
                $kof .= "ORDER BY $key $value";
            }
        } else {
            $kof = '';
        }
        if ($limit == '') {
            $sel = $this->conn->prepare("SELECT SUM($rowsum) as totCost FROM $table $kof");
        } else {
            $sel = $this->conn->prepare("SELECT SUM($rowsum) as totCost FROM $table $kof  LIMIT $limit");
        }

        $sel->execute();

        $result = $sel->fetch(PDO::FETCH_ASSOC);
        return $result['totCost'];
    }
}
