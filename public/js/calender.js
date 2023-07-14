window.onload = (e) => {
    // const buttondis = document.getElementById("buttonCalendar");
    const linkedPicker1Element = document.getElementById("linkedPickers1");
    const linked1 = new tempusDominus.TempusDominus(
        document.getElementById("linkedPickers1"),
        {
            display: {
                components: {
                    decades: true,
                    year: true,
                    month: true,
                    date: true,
                    hours: false,
                    minutes: false,
                    seconds: false,
                },
            },
        }
    );
    const linked2 = new tempusDominus.TempusDominus(
        document.getElementById("linkedPickers2"),
        {
            useCurrent: true,
            display: {
                components: {
                    decades: true,
                    year: true,
                    month: true,
                    date: true,
                    hours: false,
                    minutes: false,
                    seconds: false,
                },
            },
        }
    );

    let date1;
    let date2;

    //using event listeners
    linkedPicker1Element.addEventListener(
        tempusDominus.Namespace.events.change,
        (e) => {
            linked2.updateOptions({
                restrictions: {
                    minDate: e.detail.date,
                },
            });
            date1 = e.detail.date;
        }
    );

    //using subscribe method
    const subscription = linked2.subscribe(
        tempusDominus.Namespace.events.change,
        (e) => {
            linked1.updateOptions({
                restrictions: {
                    maxDate: e.date,
                },
            });
            date2 = e.date;
            daysLag = Math.ceil(
                Math.abs(date2.getTime() - date1.getTime()) / (1000 * 3600 * 24)
            );
            const price = document
                .getElementsByClassName("card-header")[0]
                .getAttribute("data-price");
            const total = document.getElementsByClassName("card-text")[0];
            const totalsum = parseFloat(price);
            total.innerHTML = `${(daysLag * totalsum).toLocaleString(
                "en-GB"
            )} €`;

            console.log(daysLag, totalsum);

            // n° of days
            document.getElementsByClassName("card-days")[0].innerHTML = daysLag;

            // total_sum into input form (for transaction)
            document.getElementById("total_sum").value = `${
                daysLag * totalsum
            }`;

            function send_data() {
                var request = new XMLHttpRequest();
                var one = "123";
                var two = "456";
                var send =
                    "one=" +
                    encodeURIComponent(one) +
                    "&two=" +
                    encodeURIComponent(two);
                request.open("POST", "http://sitename/index.php");
                request.setRequestHeader(
                    "Content-Type",
                    "application/x-www-form-urlencoded"
                );
                request.send(send);
            }
        }
    );
};
