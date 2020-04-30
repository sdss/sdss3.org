<?php include 'header.php'; echo head('Connection Log'); ?>

<table class="common">
<tr><th>IP Address</th><th>Hostname</th><th>Connections</th></tr>
<?php
$query = "SELECT i.name AS ip, COUNT(i.name) AS ipcount FROM connection AS c INNER JOIN ipaddress AS i ON c.ip = i.id WHERE c.invalid = 1 GROUP BY i.name ORDER BY ipcount DESC LIMIT 20;";
$database = new PDO("sqlite:access.sqlite");
$result = $database->query($query);
$rows = $result->fetchAll();
foreach ($rows as $r) {
    $dns = gethostbyaddr($r['ip']);
    echo "<tr><td>{$r['ip']}</td><td>{$dns}</td><td>{$r['ipcount']}</td></tr>\n";
}
?>
</table>

<?php echo foot(); ?>
