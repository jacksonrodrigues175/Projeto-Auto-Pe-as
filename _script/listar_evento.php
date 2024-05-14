<?php

// Include config file
include 'conex.php';

// Define query
$query_events = "SELECT id, title, color, start, end FROM events";

try {
    // Prepare query
    $result_events = $conn->prepare($query_events);
    $result_events->execute();

    // Bind results
    $result_events->bind_result($id, $title, $color, $start, $end);

    // Initialize events array
    $eventos = [];

    // Fetch and process results
    while ($row_events = $result_events->fetch()) {
        $eventos[] = [
            'id' => $id,
            'title' => $title,
            'color' => $color,
            'start' => $start,
            'end' => $end,
        ];
    }

    // Output JSON
    echo json_encode($eventos);
} catch (Exception $e) {
    // Handle error
    echo "Erro na preparação da consulta: " . $e->getMessage();
}