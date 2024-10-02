

// Read Messages from the DataBase 

let msgdiv=document.querySelector(".msg");
setInterval(() => {
  fetch("readMsg.php").then(
    r=>{
     if(r.ok){
      return r.text();
     }
    }
  ).then(
    d=>{
      msgdiv.innerHTML=d;
    }
  )
}, 500);

// ADD Messages to the DataBase 
window.onkeydown=(e)=>{
  if(e.key=="Enter"){
    console.log("Updating");
    update();
  }
}
function update(){
  let msg= encodeURIComponent(input_msg.value);
  input_msg.value="";
  fetch(`addMsg.php?msg=${msg}`).then(
    r=>{
      if(r.ok){
        return r.text();
      }
    }
  ).then(
    d=>{
      msgdiv.scrollTop=(msgdiv.scrollHeight-msgdiv.clientHeight);
    }
  )
}