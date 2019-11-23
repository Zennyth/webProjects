var trigger = [
  ["hi","hey","hello"], 
  ["how are you", "how is life", "how are things"],
  ["what are you doing", "what is going on"],
  ["how old are you"],
  ["who are you", "are you human", "are you bot", "are you human or bot"],
  ["who created you", "who made you"],
  ["your name please",  "your name", "may i know your name", "what is your name"],
  ["i love you"],
  ["happy", "good"],
  ["bad", "bored", "tired"],
  ["help me", "tell me story", "tell me joke"],
  ["ah", "yes", "ok", "okay", "nice", "thanks", "thank you"],
  ["bye", "good bye", "goodbye", "see you later"]
];
var reply = [
  ["Hi","Hey","Hello"], 
  ["Fine", "Pretty well", "Fantastic"],
  ["Nothing much", "About to go to sleep", "Can you guest?", "I don't know actually"],
  ["I am 1 day old"],
  ["I am just a bot", "I am a bot. What are you?"],
  ["Kani Veri", "My God"],
  ["I am nameless", "I don't have a name"],
  ["I love you too", "Me too"],
  ["Have you ever felt bad?", "Glad to hear it"],
  ["Why?", "Why? You shouldn't!", "Try watching TV"],
  ["I will", "What about?"],
  ["Tell me a story", "Tell me a joke", "Tell me about yourself", "You are welcome"],
  ["Bye", "Goodbye", "See you later"]
];
var alternative = ["Haha...", "Eh..."];
document.querySelector("#input").addEventListener("keypress", function(e){
  var key = e.which || e.keyCode;
  if(key === 13){ //Enter button
    var input = document.getElementById("input").value;
    if(input != "" && input != " ")
    {
      addElement("user", input);
      output(input);
    }
  }
});
function output(input){
  try{
    var product = input + "=" + eval(input);
  } catch(e){
    var text = (input.toLowerCase()).replace(/[^\w\s\d]/gi, ""); //remove all chars except words, space and 
    text = text.replace(/ a /g, " ").replace(/i feel /g, "").replace(/whats/g, "what is").replace(/please /g, "").replace(/ please/g, "");
    if(compare(trigger, reply, text)){
      var product = compare(trigger, reply, text);
    } else {
      var product = alternative[Math.floor(Math.random()*alternative.length)];
    }
  }
  speak(product);
  document.getElementById("input").value = ""; //clear input value
  addElement("chatbot", product);
}
function compare(arr, array, string){
  var item;
  for(var x=0; x<arr.length; x++){
    for(var y=0; y<array.length; y++){
      if(arr[x][y] == string){
        items = array[x];
        item =  items[Math.floor(Math.random()*items.length)];
      }
    }
  }
  return item;
}
function speak(string){
  var utterance = new SpeechSynthesisUtterance();
  utterance.voice = speechSynthesis.getVoices().filter(function(voice){return voice.name == "Alex";})[0];
  utterance.text = string;
  utterance.lang = "en-US";
  utterance.volume = 1; //0-1 interval
  utterance.rate = 1;
  utterance.pitch = 2; //0-2 interval
  speechSynthesis.speak(utterance);
}
function addElement (type, content) {
  var date = new Date();
  // crée un nouvel élément div
  var newDiv = document.createElement("div");
  // ajoute le nœud texte au nouveau div créé
  newDiv.classList.add("container");
  var newImg = document.createElement("Img");
  var newP = document.createElement("p");
  newP.textContent = content;
  var newSpan = document.createElement("span");
  newSpan.textContent = date.getHours() + ":" + date.getMinutes();

  if(type == "user")
  {
    newDiv.classList.add("darker");
    newImg.src = "../images/flatusericon.png";
    newImg.classList.add("right");
    newP.id = "user";
    newSpan.classList.add("time-left");
  }
  else{
    newImg.src = "../images/Spectre.jpg";
    newP.id = "chatbot";
    newSpan.classList.add("time-right");
  }

  newDiv.appendChild(newImg);
  newDiv.appendChild(newP);
  newDiv.appendChild(newSpan);

  // ajoute le nouvel élément créé et son contenu dans le DOM
  var currentDiv = document.getElementById('chatBot');
  currentDiv.appendChild(newDiv);
  var container = document.getElementById('chatBot');
  container.scrollTop = container.scrollHeight;
}
function lenTwo(fn){
  return function(){return ('0'+fn.call(this)).substr(-2,2)}
}
with(Date.prototype){
  getDay = lenTwo(getDay);
  getMonth = lenTwo(getMonth);
  getHours = lenTwo(getHours);
  getMinutes = lenTwo(getMinutes);
}