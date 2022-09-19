document.addEventListener("DOMContentLoaded", function(){
    let auto = document.querySelectorAll(".autocomplete");
    M.Autocomplete.init(auto,{
        data : {
            "Diarrhoea":null,
            "Tuberculosis":null,
            "Dysentery ( Bloody Diarrhoea )":null,
            "Cholera":null,
            "Meningococcal Meningitis":null,
            "Other Meningitis":null,
            "Tetanus":null,
            "Poliomyelitis (AFP)":null,
            "Chicken Pox":null,
            "Measles":null,
            "Hepatitis":null,
            "Mumps":null,
            "Fevers":null,
            "Suspected Malaria":null,
            "Confirmed Malaria ( Only Positive Cases )":null,
            "Malaria in Pregnancy":null,
            "Typhoid Fever":null,
            "Sexually Transmitted Infections":null,
            "Urinary Tract Infections":null,
            "Bilharzia":null,
            "Intestinal Worms":null,
            "Malnutrition":null,
            "Anaemia":null,
            "Eye Infections":null,
            "Other Eye Conditions":null,
            "Ear Infections":null,
            "Upper Respiratory Tract Infections":null,
            "Asthma":null,
            "Pneumonia":null,
            "Other Dis. of Respiratory System":null,
            "Arbotion":null,
            "Dis. of Puerperium and Child Birth":null,
            "Hypertension":null,
            "Mental Disorders":null,
            "Dental Disroders":null,
            "Jiggers Infestation":null,
            "Diseases of the Skin":null,
            "Anthritis:null, Joint Pains:null, etc.":null,
            "Poisoning":null,
            "Road Traffic Injuries":null,
            "Other Injuries":null,
            "Sexual Assualt":null,
            "Violence Related Injuries":null,
            "Burns":null,
            "Snake Bites":null,
            "Dog Bites":null,
            "Other Bites":null,
            "Diabetes":null,
            "Epilepsy":null,
            "Newly Diagnosed HIV":null,
            "Brucellosis":null,
            "Cardiovascular conditions":null,
            "Central Nervous System Condtions":null,
            "Overweight ( BMI > 25 )":null,
            "Muscular Skeletal Condtions":null,
            "Fistula ( Birth Related )":null,
            "Neoplams":null,
            "Physical Disability":null,
            "Tryponosomiasis":null,
            "Kalazar ( Leshmenaiasis )":null,
            "Dracunculosis ( Guinea Worm )":null,
            "Yellow Fever":null,
            "Viral Haemorrhagic Fever":null,
            "Plague":null,
            "Death due to road traffic injuries":null,
            "Fractures":null,
            "<b>ALL OTHER DISEASES</b>":null,
            "<b>NO. OF FIRST ATTENDANCES</b>":null,
            "<b>RE-ATTENDACES</b>":null,
            "<b>Referrals from other health facility</b>":null,
            "<b>Referrals to other health facility</b>":null,
            "<b>Referrals from Community Unit</b>":null,
            "<b>Referrals to Community Unit</b>":null
        },
        limit:2
    });
});

document.addEventListener('DOMContentLoaded', function() {
var elems = document.querySelectorAll('.fixed-action-btn');
var instances = M.FloatingActionButton.init(elems, {
  direction: 'left',
  hoverEnabled: false
});
});

$(document).ready(function(){
  $('.modal').modal();
});

$(document).ready(function(){
  $('select').formSelect();
});

$(document).ready(function(){
    $('.tooltipped').tooltip();
});
