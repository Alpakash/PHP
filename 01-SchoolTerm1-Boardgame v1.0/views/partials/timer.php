<script>
        window.onload = () => {
            let hour = 00;
            let minute = 00;
            let seconds = 00;
            let totalSeconds = 00;

            let intervalId = null;

            function startTimer() {
                ++totalSeconds;
                hour = Math.floor(totalSeconds / 3600);
                minute = Math.floor((totalSeconds - hour * 3600) / 60);
                seconds = totalSeconds - (hour * 3600 + minute * 60);

                document.getElementById("hour").innerHTML = hour;
                document.getElementById("minute").innerHTML = minute;
                document.getElementById("seconds").innerHTML = seconds;
            }

            document.getElementById('start-btn').addEventListener('click', () => {
                intervalId = setInterval(startTimer, 1000);
            })

            document.getElementById('stop-btn').addEventListener('click', () => {
                if (intervalId)
                    clearInterval(intervalId);
            });


            document.getElementById('reset-btn').addEventListener('click', () => {
                totalSeconds = 00;
                document.getElementById("hour").innerHTML = '00';
                document.getElementById("minute").innerHTML = '00';
                document.getElementById("seconds").innerHTML = '00';
            });
        }
    </script>