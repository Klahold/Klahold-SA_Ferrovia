
let i = false

function fun(){
    

    if(i == false){
    
    document.getElementById("frame1").style.visibility="visible";
    document.getElementById("frame1").classList.add("style");
        i=true
    }else{
        document.getElementById("frame1").style.visibility="hidden";
        document.getElementById("frame1").classList.add("style");
        i=false
    }
}

