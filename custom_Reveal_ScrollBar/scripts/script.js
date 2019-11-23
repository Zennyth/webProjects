
const overlay = document.getElementById('overlay');
const closeMenu = document.getElementById('close-menu');


document.getElementById('open-menu') .addEventListener('click', function() {
	overlay.classList.remove('close-menu');
    overlay.classList.add('show-menu');
});

document.getElementById('close-menu').addEventListener('click', function(){
    overlay.classList.remove('show-menu');
    overlay.classList.add('close-menu');
})
function openForm() {
   document.getElementById("title").style.display = "none";
  document.getElementById("chatBot").style.display = "block";
  document.getElementById("chatBot").style.visibility = "visible";
  document.getElementById("chatBot").style.opacity = "1";
  document.getElementById("open-button").onclick = function() {closeForm()};

}

function closeForm() {
  document.getElementById("chatBot").style.opacity = "0";
  document.getElementById("chatBot").style.visibility = "hidden";
  setTimeout(function() {
      document.getElementById("chatBot").style.display = "none";
       document.getElementById("title").style.display = "block";
    }, 800);
  document.getElementById("open-button").onclick = function() {openForm()};
}

//Sound Button Part's
document.getElementById('Btn-sound-Id') .addEventListener('click', function() {
	var Value = document.getElementById('SoundWaveTropStyle').getAttribute('d');
	if(Value == 'M92.4,5.5h-2.7h-2.4H82h-2.4h-5.3h-2.4h-2.6h-2.6h-2.4H59h-2.4h-5.3h-2.4h-2.7h-2.7h-2.4h-5.3h-2.4h-5.3h-2.4h-2.6h-2.6h-2.4h-5.3h-2.4l-5.3,0l-2.4,0H0')
	{
		document.getElementById("SpanSound").innerHTML="Désactiver le son";
		document.getElementById('SoundWaveTropStyle').setAttribute('d','M92.4,7c-1.1,0-2.1-0.1-2.7-0.7c-0.8-0.7-1.6-1.5-2.4-2.3c-1.2-1.3-4.1-1.6-5.3-0.2c-0.8,0.9-1.6,1.9-2.4,2.9c-1.2,1.6-4,1.9-5.3,0.2c-0.8-1.1-1.6-2.2-2.4-3.4c-0.6-1-1.6-1.5-2.6-1.6c-1-0.1-2,0.4-2.6,1.4c-0.8,1.3-1.6,2.6-2.4,4C63,9.4,60.2,9.7,59,7.5c-0.8-1.5-1.6-3-2.4-4.5c-1.2-2.4-4.1-2.7-5.3-0.2c-0.8,1.6-1.6,3.3-2.4,5.1c-0.6,1.3-1.7,2.1-2.7,2.1s-2.1-0.9-2.7-2.1c-0.8-1.8-1.6-3.4-2.4-5.1c-1.2-2.5-4.1-2.2-5.3,0.2C35,4.5,34.2,6,33.4,7.5c-1.2,2.2-4,1.9-5.3-0.2c-0.8-1.4-1.6-2.7-2.4-4c-0.6-1-1.6-1.5-2.6-1.4c-1,0.1-2,0.6-2.6,1.6c-0.8,1.2-1.6,2.3-2.4,3.4c-1.3,1.7-4.1,1.4-5.3-0.2c-0.8-1-1.6-2-2.4-2.9C9.2,2.4,6.3,2.8,5.1,4C4.3,4.9,3.5,5.6,2.7,6.3C2.1,6.9,1.1,7,0,7');
	}
	else
	{
		document.getElementById("SpanSound").innerHTML="Activer le son";
		document.getElementById('SoundWaveTropStyle').setAttribute('d','M92.4,5.5h-2.7h-2.4H82h-2.4h-5.3h-2.4h-2.6h-2.6h-2.4H59h-2.4h-5.3h-2.4h-2.7h-2.7h-2.4h-5.3h-2.4h-5.3h-2.4h-2.6h-2.6h-2.4h-5.3h-2.4l-5.3,0l-2.4,0H0');
	}
});

//Horloge Part's

function initLocalClocksFrom0() {
  // Get the local time using JS
  var date = new Date;
  var seconds = 0;
  var minutes = 0;
  var hours = 0;
  var dateToReach = new Date;
  var secondsToReach = date.getSeconds();
  var minutesToReach = date.getMinutes();
  var hoursToReach = date.getHours();
  // Create an object with each hand and it's angle in degrees
  var hands = [
    {
      hand: 'hours',
      angle: (hours * 30) + (minutes / 2)
    },
    {
      hand: 'minutes',
      angle: (minutes * 6)
    },
    {
      hand: 'seconds',
      angle: (seconds * 6)
    }
  ];
  var handsToReach = [
    {
      hand: 'hours',
      angle: (hoursToReach * 30) + (minutesToReach / 2)
    },
    {
      hand: 'minutes',
      angle: (minutesToReach * 6)
    },
    {
      hand: 'seconds',
      angle: (secondsToReach * 6)
    }
  ];
  for (var j = 0; j < hands.length; j++) {
    var elements = document.querySelectorAll('.' + hands[j].hand);
    for (var k = 0; k < elements.length; k++) {
        elements[k].style.webkitTransform = 'rotateZ('+ hands[j].angle +'deg)';
        elements[k].style.transform = 'rotateZ('+ hands[j].angle +'deg)';
        // If this is a minute hand, note the seconds position (to calculate minute position later)
        if (hands[j].hand === 'minutes') {
          elements[k].parentNode.setAttribute('data-second-angle', hands[j + 1].angle);
        }
    }
  }

}

function initLocalClocks() {
  // Get the local time using JS
  var date = new Date;
  var seconds = date.getSeconds();
  var minutes = date.getMinutes();
  var hours = date.getHours();
  // Create an object with each hand and it's angle in degrees
  var hands = [
    {
      hand: 'hours',
      angle: (hours * 30) + (minutes / 2)
    },
    {
      hand: 'minutes',
      angle: (minutes * 6)
    },
    {
      hand: 'seconds',
      angle: (seconds * 6)
    }
  ];
  // Loop through each of these hands to set their angle
  for (var j = 0; j < hands.length; j++) {
    var elements = document.querySelectorAll('.' + hands[j].hand);
    for (var k = 0; k < elements.length; k++) {
        elements[k].style.webkitTransform = 'rotateZ('+ hands[j].angle +'deg)';
        elements[k].style.transform = 'rotateZ('+ hands[j].angle +'deg)';
        // If this is a minute hand, note the seconds position (to calculate minute position later)
        if (hands[j].hand === 'minutes') {
          elements[k].parentNode.setAttribute('data-second-angle', hands[j + 1].angle);
        }
    }
  }
}

/*
 * Set a timeout for the first minute hand movement (less than 1 minute), then rotate it every minute after that
 */
function setUpMinuteHands() {
  // Find out how far into the minute we are
  var containers = document.querySelectorAll('.minutes-container');
  var secondAngle = containers[0].getAttribute("data-second-angle");
  if (secondAngle > 0) {
    // Set a timeout until the end of the current minute, to move the hand
    var delay = (((360 - secondAngle) / 6) + 0.1) * 1000;
    setTimeout(function() {
      moveMinuteHands(containers);
    }, delay);
  }
}

/*
 * Do the first minute's rotation
 */
function moveMinuteHands(containers) {
  for (var i = 0; i < containers.length; i++) {
    containers[i].style.webkitTransform = 'rotateZ(6deg)';
    containers[i].style.transform = 'rotateZ(6deg)';
  }
  // Then continue with a 60 second interval
  setInterval(function() {
    for (var i = 0; i < containers.length; i++) {
      if (containers[i].angle === undefined) {
        containers[i].angle = 12;
      } else {
        containers[i].angle += 6;
      }
      containers[i].style.webkitTransform = 'rotateZ('+ containers[i].angle +'deg)';
      containers[i].style.transform = 'rotateZ('+ containers[i].angle +'deg)';
    }
  }, 60000);
}

function moveSecondHands() {
  var containers = document.querySelectorAll('.seconds-container');
  setInterval(function() {
    for (var i = 0; i < containers.length; i++) {
      if (containers[i].angle === undefined) {
        containers[i].angle = 6;
      } else {
        containers[i].angle += 6;
      }
      containers[i].style.webkitTransform = 'rotateZ('+ containers[i].angle +'deg)';
      containers[i].style.transform = 'rotateZ('+ containers[i].angle +'deg)';
    }
  }, 1000);
}
/*
function scrollAppear()
{
  var text = document.querySelector('.centeredContentLeft');
  var textPos = text.getBoundingClientRect().top;
  var screenPos = window.innerHeight / 1.2;

  if(textPos < screenPos){
    text.classList.add('centeredContentLeft-appear');
  }
  if(textPos > screenPos)
  {
    text.classList.remove('centeredContentLeft-appear');
  }

}
window.addEventListener('scroll', scrollAppear);

*/
function scrollAppear(className)
{
  var screenPos = window.innerHeight / 1.2;
  var ActClass = '.'+className;
  var text = document.querySelectorAll(String(ActClass)), i;
  for (i = 0; i < text.length; ++i) {
    var textPos = text[i].getBoundingClientRect().top;
    if(textPos < screenPos){
      text[i].classList.add(className+'Appear');
      //parallax(ActClass, window.scrollY, 0.02);
    }
    if(textPos > screenPos)
    {
      text[i].classList.remove(className+'Appear');
    }
  }
}
window.addEventListener('scroll', function(){scrollAppear('ImgContent');}, true);
window.addEventListener('scroll', function(){scrollAppear('xlarge-font');}, true);
window.addEventListener('scroll', function(){scrollAppear('large-font');}, true);
window.addEventListener('scroll', function(){scrollAppear('up');}, true);
window.addEventListener('scroll', function(){scrollAppear('down');}, true);
window.addEventListener('scroll', function(){scrollAppear('progress-container');}, true);
function parallax(element, distance, speed)
{
  var item = document.querySelectorAll(element),i;
  for (i = 0; i < item.length; ++i) {
    item[i].style.transform = "translateY("+speed*distance+"px)";
  }
}

window.onscroll = function() {scrollBar()};

function scrollBar() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.height = scrolled + "%";
}
/*
window.addEventListener('scroll', function(){
  parallax('.centeredContentLeft', window.scrollY, 0.1);
})*/
