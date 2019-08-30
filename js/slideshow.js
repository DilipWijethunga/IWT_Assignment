var currentSlider = 0 ;
var timeout = 0;

function changeSlider(slider){
    sliders = document.getElementsByClassName('slider');
    slider = slider % sliders.length;
    for (var slide = 0; slide < sliders.length; slide++) {
        var element = sliders[slide];
        
        if(slide>slider){
            element.setAttribute('class','slider right');
        } else if(slide<slider) {
            element.setAttribute('class','slider left');
        } else {
            element.setAttribute('class','slider');
        }

    }

    var numbers = document.getElementsByClassName('slider-number');

    var i =0;

    for(var number of numbers){
        if(i!==slider){
            number.setAttribute('class','button slider-number number-'+(i++))
        } else {
            number.setAttribute('class','button slider-number active number-'+(i++))
        }
    }
    
}

function slider(){
    timeout = window.setTimeout(function(){

        changeSlider(currentSlider)
        slider();

        currentSlider++;
    },2000)
}

function handleChangeSlider(sliderModify,modify=false){
    window.clearTimeout(timeout);
    if(modify){
        currentSlider+= sliderModify;
    } else {
        currentSlider = sliderModify - 1;
    }

    changeSlider(currentSlider);
    slider();
}
