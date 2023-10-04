var part1=document.querySelector("#part1");
var part2=document.querySelector("#part2");
document.getElementById("part1");
var part1_btn=document.querySelector(".suivant_btn1");
var part2_back_btn=document.querySelector(".precedent_btn");

part1_btn.addEventListener("click",function(){
    part1.style.display="none";
    part2.style.display="block";
    
 });
 part2_back_btn.addEventListener("click",function(){
    part1.style.display="block";
    part2.style.display="none";
    
 });