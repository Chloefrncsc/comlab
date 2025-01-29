<?php
$computers = [
    "PC1" => "192.168.0.107", // Palitan mo ito ng tamang IP ng ibang PC
    "PC2" => "192.168.1.110"  // Dagdagan mo ng iba pang computers sa lab
];

echo "<h2>Active Computers in Computer Lab</h2>";
echo "<table border='1'><tr><th>PC Name</th><th>IP Address</th><th>Status</th></tr>";

foreach ($computers as $name => $ip) {
    $pingResult = shell_exec("ping -n 1 -w 1 $ip"); // Windows (-n 1) | Linux (-c 1)
    
    if (strpos($pingResult, "Reply from") !== false) {
        $status = "🟢 Online";
    } else {
        $status = "🔴 Offline";
    }

    echo "<tr><td>$name</td><td>$ip</td><td>$status</td></tr>";
}

echo "</table>";
?>
