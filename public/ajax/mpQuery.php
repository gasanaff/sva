<?php
function m_pquery(mysqli $connection, string $query, array $params = []): bool|array
{
    try {
        $stmt = $connection->prepare($query);
        if(!$stmt){
            return false;
        }
        if(count($params) > 0){
            foreach ($params as $param){
                if (is_int($param))
                    $stmt->bind_param('i', $param);
                elseif (is_string($param))
                    $stmt->bind_param('s', $param);
                elseif (is_double($param))
                    $stmt->bind_param('d', $param);
                else
                    $stmt->bind_param('b', $param);
            }
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result->fetch_all(MYSQLI_ASSOC);
    } catch (Exception $e) {
        return false;
    }
}
