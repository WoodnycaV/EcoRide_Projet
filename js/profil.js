
document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('btn_chauffeur');
    const info = document.getElementById('page_chauffeur');

    checkbox.addEventListener('change', function() {
       
        if(checkbox.checked) {
            info.style.display = 'block';
                
        } else { 
                info.style.display = 'none';
                
        } 
        
    });
});


function afficheTab(tab) {
    document.getElementById('tab_trajet').style.display = (tab === 'trajet') ? 'block' : 'none';
    document.getElementById('tab_reservation').style.display = (tab === 'reservation') ? 'block' : 'none';
  
    document.getElementById('lien_trajet').classList.toggle('active', tab === 'trajet');
    document.getElementById('lien_reservation').classList.toggle('active', tab === 'reservation');

}
document.getElementById('lien_trajet').click();
