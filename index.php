<!DOCTYPE html>
<html>

<head>
    <title>Blue Bouncing Balls</title>
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .ball {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: blue;
            position: absolute;
            transition: top 0.3s, left 0.3s; /* CSS transitions for smooth movement */
        }
    </style>
</head>

<body>
    <?php
    $ballsCount = 10;
    for ($i = 0; $i < $ballsCount; $i++) {
        $x = rand(0, 100);
        $y = rand(0, 100);
        echo "<div class='ball' style='top: {$y}%; left: {$x}%;'></div>";
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
                if (x < 0 || x > 100) {
                    vx = -vx;
                }
                if (y < 0 || y > 100) {
                    vy = -vy;
                }

                ball.style.left = x + '%';
                ball.style.top = y + '%';
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
