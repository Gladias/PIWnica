function count(){
    let stars = 0;
    for(let i = 1; i <= 5; i++){
        if(document.getElementById("star_" + i).style.color==="yellow"){
            stars++;
        }
    }
    return stars;
}

function hover() {
    let star = "star_"
    for (let i = 1; i <= 5; i++) {
        document.getElementById(star + i).onmouseover = onmouseover;

        document.getElementById(star + i).onmouseout = onmouseout;

        document.getElementById(star + i).onclick = onclick;

        function onmouseover() {
            for(let j = i; j > 0; j--)
                document.getElementById(star + j).style.color = "yellow";
        }

        function onmouseout() {
            for(let j = i; j > 0; j--)
                document.getElementById(star + j).style.color = "white";
        }

        function onclick() {
            for (let j = 1; j <= 5; j++){
                document.getElementById(star + j).onmouseover = null;
                document.getElementById(star + j).onmouseout = null;

                for(let k = i + 1; k <= 5; k++)
                    document.getElementById(star + k).style.color = "white";
                for(let k = i; k > 0; k--)
                    document.getElementById(star + k).style.color = "yellow";
            }

            let rate = countStars();
            document.getElementById('rate').value = rate;
            if(rate > 0) showSubmit();
        }
    }
}

hover();
