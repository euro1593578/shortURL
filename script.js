
//get a element to gen short link
const form = document.querySelector(".input_url form"),
common_url = form.querySelector("input"),
short_btn = form.querySelector("button"),
show = document.querySelector(".show"),
short_url = show.querySelector("input"),
save_url = show.querySelector("button");


form.onsubmit = (e)=>{
    e.preventDefault();
}
//processing of data linked
short_btn.onclick = () =>{
    //ues ajax send data to url-control.php and show data to the index
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "urlcon/url-control.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == 4 && xhr.status == 200){
            let data = xhr.response;
            if(data.length <= 5){
                show.style.display = "block";
                let domain = "localhost/test/"; 
                short_url.value = domain + data;

                // save_url.onclick= () =>{
                //     location.reload();
                // }
            }else{
                alert (data);
            }
        }
    };
    let formData = new FormData(form);
    xhr.send(formData);
}




const qr_code = document.querySelector(".qr_code form"),
qr_input = qr_code.querySelector("input"),
qr_btn = qr_code.querySelector("button");

qr_show = document.querySelector(".qr_show");


qr_code.onsubmit = (e)=>{
    e.preventDefault();
}

qr_btn.onclick = () =>{
    //ues ajax send data to url-control.php and show data to the index
    let qr_xhr = new XMLHttpRequest();
    qr_xhr.open("POST", "urlcon/qrcode-control.php", true);
    qr_xhr.onload = () =>{
        if(qr_xhr.readyState == 4 && qr_xhr.status == 200){
            let data = qr_xhr.response;
            console.log(data);
            if(data != ""){
                    if (qr_show.childElementCount == 0) {
                      generate(data);
                    } else {
                      qr_show.innerHTML = "";
                      generate(data);
                    }
                // console.log(data);
            }else{
                alert("Please put ours short URL");
            }
        }
    
    };
    let formData2 = new FormData(qr_code);
    qr_xhr.send(formData2);
}

function generate(data) {
    qr_show.style = "";
    var qrcode = new QRCode(qr_show, {
      text: `${data}`,
      width: 180, //128
      height: 180,
      colorDark: "#000000",
      colorLight: "#ffffff",
      correctLevel: QRCode.CorrectLevel.H
    });
}