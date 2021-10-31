/**Comentário*/

document.write("<h2>" + "HELLO!" + "</h2>");

function hello(){
    var nome;
    nome = prompt("Qual seu nome?");
    alert("Hello " + nome);
}

var sorteio = Math.floor(Math.random() * 6 + 1);

switch(sorteio){
    case 1:
        document.getElementById("face").src = "imagens/face1.png";
        break;

    case 2:
        document.getElementById("face").src = "imagens/face2.png";
        break;

    case 3:
        document.getElementById("face").src = "imagens/face3.png";
        break;

    case 4:
        document.getElementById("face").src = "imagens/face4.png";
        break;

    case 5:
        document.getElementById("face").src = "imagens/face5.png";
        break;
        
    case 6:
        document.getElementById("face").src = "imagens/face6.png";
        break;
        
    default:
        
        break;
}