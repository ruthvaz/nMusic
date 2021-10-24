/*
[0] Rock
[1] Pop
[2] Rap
*/

var bandas = [
    [
        { nome: "Guns N' Roses", inicio: 1985, url: "o1tj2zJ2Wvg" },
        { nome: "Kansas", inicio: 1970, url: "P5ZJui3aPoQ" },
        { nome: "Metallica", inicio: 1981, url: "CD-E-LDc384" },
        { nome: "Avenged Sevenfold", inicio: 1999, url: "94bGzWyHbu0" }, 
        { nome: "The Darkness", inicio: 2000, url: "RAejxjC_PBs" },
        { nome: "Gorillaz", inicio: 1998, url: "WXR-bCF5dbM" },
    ],
    [
        { nome: "Michael Jackson", inicio: 1964, url: "T7PL3rmUhDI" },
        { nome: "Madona", inicio: 1979, url: "8q2WS6ahCnY" },
        { nome: "Boney M", inicio: 1975, url: "16y1AkoZkmQ" },
        { nome: "Lady Gaga", inicio: 2001, url: "bESGLojNYSo" },
        { nome: "Katy Perry", inicio: 2001, url: "0KSOMA3QBU0" },
        { nome: "Billie Eilish", inicio: 2015, url: "ebb5AinKxWI" },
    ],
    [
        { nome: "Jay-Z", inicio: 1988, url: "_mvJjasS4q8" },
        { nome: "Eminem", inicio: 1988, url: "YVkUvmDQ3HY" },
        { nome: "Ice Cube", inicio: 1984, url: "h4UqMyldS7Q" },
        { nome: "Will Smith", inicio: 1990, url: "AVbQo3IOC_A" },
        { nome: "Lil Peep", inicio: 2014, url: "-jRKsiAOAA8" },
        { nome: "50 Cent", inicio: 1996, url: "5qm8PH4xAss" },
        { nome: "Lil Nas X", inicio: 2018, url: "r7qovpFAGrQ" },
    ],
];

/*

Jovem       00 -- 20
Adulto      20 -| ~~

*/

function mostra() {
    var select = document.getElementById("banda");
    var opcao = select.options[select.selectedIndex].value;
    var idade = document.getElementById("idade").value;
    var ano = new Date().getFullYear();

    var video = document.getElementById("video");

    video.innerHTML = "";

    if(opcao == "rock") {
        for(var i = 0; i < bandas[0].length; i++) {
            if( (ano - bandas[0][i].inicio) > 30 && idade > 20) {
                exibe(bandas[0][i]);
            } 
            if( (ano - bandas[0][i].inicio) < 30 && idade < 20) {
                exibe(bandas[0][i]);
            }
        }
    } else if(opcao == "pop") {
        for(var i = 0; i < bandas[1].length; i++) {
            if( (ano - bandas[1][i].inicio) > 30 && idade > 20) {
                exibe(bandas[1][i]);
            }
            if( (ano - bandas[1][i].inicio) < 30 && idade < 20) {
                exibe(bandas[1][i]);
            }
        }
    } else {
        for(var i = 0; i < bandas[2].length; i++) {
            if( (ano - bandas[2][i].inicio) > 30 && idade > 20) {
                exibe(bandas[2][i]);
            }
            if( (ano - bandas[2][i].inicio) < 30 && idade < 20) {
                exibe(bandas[2][i]);
            }
        }
    }

}

function exibe(vetor) {

    var video = document.getElementById("video");

    var tag = document.createElement('iframe');
    
    var largura = document.createAttribute("width");
    largura.value = "600";
    tag.setAttributeNode(largura);

    var altura = document.createAttribute("height");
    altura.value = "400";
    tag.setAttributeNode(altura);

    var fonte = document.createAttribute("src");
    fonte.value = "https://www.youtube.com/embed/" + vetor.url;
    tag.setAttributeNode(fonte);

    var title = document.createAttribute("title");
    title.value = "YouTube video player";
    tag.setAttributeNode(title);

    var borda = document.createAttribute("frameborder");
    borda.value = "0";
    tag.setAttributeNode(borda);

    var allow = document.createAttribute("allow");
    allow.value = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
    tag.setAttributeNode(allow);

    var fullscreem = document.createAttribute("allowfullscreen");
    tag.setAttributeNode(fullscreem);
    
    video.appendChild(tag);

}
