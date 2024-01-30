$(function() {
    const lotteryDate = new Date("2024-03-15T20:00:00");

    const countdown = {
        'root': null,
        'col1': null,
        'col2': null,
        'col3': null,
    };
  
    const updateCountdown = () => {
        const currentDate = new Date();
        const timeDifference = lotteryDate - currentDate;
        console.log(timeDifference);

        if(timeDifference < 0) {
            $(".countdown").html('<p>Losowanie już się odbyło!</p>');
            clearInterval(updateCountdown);
        }
  
        const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

        if (days > 1) {
          countdown.col1.find('.count').text(days);
          countdown.col1.find('.unit').text("days");

          countdown.col2.find('.count').text(hours);
          countdown.col2.find('.unit').text("hours");

          countdown.col3.find('.count').text(minutes);
          countdown.col3.find('.unit').text("minutes");

        } else {
          countdown.col1.find('.count').text(hours);
          countdown.col1.find('.unit').text("hours");

          countdown.col2.find('.count').text(minutes);
          countdown.col2.find('.unit').text("minutes");

          countdown.col3.find('.count').text(seconds);
          countdown.col3.find('.unit').text("seconds");
        }
    }

    const setupCoundown = () => {
        countdown.root = $("#countdown");
        countdown.col1 = countdown.root.find('#countdown-col-1');
        countdown.col2 = countdown.root.find('#countdown-col-2');
        countdown.col3 = countdown.root.find('#countdown-col-3');
    }
  
    setupCoundown();

    if(countdown.root) {
        updateCountdown();
        setInterval(updateCountdown, 1000);    
    }
});