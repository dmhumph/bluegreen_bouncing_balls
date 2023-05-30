<!DOCTYPE html>
<html>
<head>
    <title>Blue Bouncing Balls</title>
    <style>
        #canvas {
            position: relative;
            width: 500px;
            height: 300px;
            border: 1px solid #000;
        }

        .ball {
            position: absolute;
            width: 50px;
            height: 50px;
            background-color: blue;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div id="canvas">
        <?php
        $numBalls = 10; // Number of balls to display

        for ($i = 0; $i < $numBalls; $i++) {
            $left = rand(0, 450); // Random left position
            $top = rand(0, 250); // Random top position

            echo '<div class="ball" style="left: ' . $left . 'px; top: ' . $top . 'px;"></div>';
        }
        ?>
    </div>

    <script>
        var balls = document.getElementsByClassName('ball');

        function animateBalls() {
            for (var i = 0; i < balls.length; i++) {
                var ball = balls[i];
                var left = parseInt(ball.style.left, 10);
                var top = parseInt(ball.style.top, 10);
                var xSpeed = Math.random() * 10 - 5; // Random horizontal speed
                var ySpeed = Math.random() * 10 - 5; // Random vertical speed

                // Update ball position
                left += xSpeed;
                top += ySpeed;

                // Check boundaries
                if (left <= 0 || left >= 450) {
                    xSpeed = -xSpeed; // Reverse horizontal speed
                }
                if (top <= 0 || top >= 250) {
                    ySpeed = -ySpeed; // Reverse vertical speed
                }

                // Update ball style
                ball.style.left = left + 'px';
                ball.style.top = top + 'px';
            }

            requestAnimationFrame(animateBalls);
        }

        animateBalls();
    </script>
</body>
</html>
