<?php
$logFile = __DIR__ . '/../log/' . PATH_LOG;

if (file_exists($logFile)) {
		$logLines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>

<?php if (!empty($logLines)): ?>
<ol>
	<?php foreach ($logLines as $logLine): ?>
		<?php $logData = explode('|', $logLine, 3); ?>
		<li>
			<?= htmlspecialchars(date('d-m-Y H:i:s', (int) ($logData[0] ?? 0)), ENT_QUOTES, 'UTF-8') ?>
			- <?= htmlspecialchars($logData[1] ?? '', ENT_QUOTES, 'UTF-8') ?>
			-&gt; <?= htmlspecialchars($logData[2] ?? '', ENT_QUOTES, 'UTF-8') ?>
		</li>
	<?php endforeach; ?>
</ol>
<?php else: ?>
<p>Журнал посещений пока пуст.</p>
<?php endif; ?>
