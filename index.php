<?php
// index.php

$ballsCount = 10;

// Generate random positions and velocities for the balls
$balls = [];
for ($i = 0; $i < $ballsCount; $i++) {
    $ball = [
        'x' => rand(0, 800),
        'y' => rand(0, 600),
        'vx' => rand(-5, 5),
        'vy' => rand(-5, 5)
    ];
    $balls[] = $ball;
}

// Update the positions of the balls
foreach ($balls as &$ball) {
    $ball['x'] += $ball['vx'];
    $ball['y'] += $ball['vy'];

    // Reverse direction if ball hits the boundaries
    if ($ball['x'] < 0 || $ball['x'] > 770) {
        $ball['vx'] = -$ball['vx'];
    }
    if ($ball['y'] < 0 || $ball['y'] > 570) {
        $ball['vy'] = -$ball['vy'];
    }
}
unset($ball);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Blue Bouncing Balls</title>
    <style>
        .ball {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: blue;
            position: absolute;
        }
    </style>
</head>

<body>
    <?php foreach ($balls as $index => $ball): ?>
        <div id="ball-<?php echo $index; ?>" class="ball" style="top: <?php echo $ball['y']; ?>px; left: <?php echo $ball['x']; ?>px;"></div>
    <?php endforeach; ?>

    <script>
        // Function to update the positions of the balls
        function updatePositions() {
            var balls = <?php echo json_encode($balls); ?>;

            balls.forEach(function(ball, index) {
                var ballElement = document.getElementById('ball-' + index);
                ballElement.style.left = ball.x + 'px';
                ballElement.style.top = ball.y + 'px';
            });

            // Repeat the update after a delay
            setTimeout(updatePositions, 30);
        }

        // Call the updatePositions function when the page loads
        window.onload = updatePositions;
    </script>
</body>

</html>
