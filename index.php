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
    <?php
    $ballsCount = 10;
    for ($i = 0; $i < $ballsCount; $i++) {
        $x = rand(0, 800);
        $y = rand(0, 600);
        echo "<div class='ball' style='top: {$y}px; left: {$x}px;'></div>";
    }
    ?>

    <script>
        // Function to update the positions of the balls
        function updatePositions() {
            var balls = document.querySelectorAll('.ball');

            balls.forEach(function(ball) {
                var x = parseInt(ball.style.left);
                var y = parseInt(ball.style.top);
                var vx = Math.floor(Math.random() * 5) - 2;
                var vy = Math.floor(Math.random() * 5) - 2;

                x += vx;
                y += vy;

                // Reverse direction if ball hits the boundaries
                if (x < 0 || x > 770) {
                    vx = -vx;
                }
                if (y < 0 || y > 570) {
                    vy = -vy;
                }

                ball.style.left = x + 'px';
                ball.style.top = y + 'px';
            });

            // Repeat the update after a delay
            requestAnimationFrame(updatePositions);
        }

        // Call the updatePositions function when the page loads
        window.onload = function() {
            requestAnimationFrame(updatePositions);
        };
    </script>
</body>

</html>
