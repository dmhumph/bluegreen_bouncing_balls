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
        $x = rand(30, 70); // Adjusted to keep some padding from the edges
        $y = rand(30, 70); // Adjusted to keep some padding from the edges
        echo "<div class='ball'></div>";
    }
    ?>

    <script>
        // Function to update the positions of the balls
        function updatePositions() {
            var balls = document.querySelectorAll('.ball');
            var maxX = window.innerWidth - 30; // Adjusted for ball width
            var maxY = window.innerHeight - 30; // Adjusted for ball height

            balls.forEach(function(ball) {
                var x = parseInt(ball.style.left) || Math.floor(Math.random() * maxX);
                var y = parseInt(ball.style.top) || Math.floor(Math.random() * maxY);
                var vx = Math.floor(Math.random() * 5) - 2;
                var vy = Math.floor(Math.random() * 5) - 2;

                x += vx;
                y += vy;

                if (x < 0) {
                    x = 0;
                    vx = -vx;
                } else if (x > maxX) {
                    x = maxX;
                    vx = -vx;
                }

                if (y < 0) {
                    y = 0;
                    vy = -vy;
                } else if (y > maxY) {
                    y = maxY;
                    vy = -vy;
                }

                ball.style.left = x + 'px';
                ball.style.top = y + 'px';

                // Bounce off the bottom of the screen
                if (y === maxY) {
                    vy = -vy;
                }
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
