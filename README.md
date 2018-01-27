# my.library
###PHP school project

Proiectul implementeaza gestiunea unei biblioteci. Aplicatia Web contine doua
parti, interfata de administrator si interfata de utilizator. In momentul autentificarii,
aplicatia verifica daca utilizatorul este _admin_ sau nu si il redirecteaza spre sub-siteul corespunzator.

Functionalitati:

- utilizatorul poate cauta carti dupa titlu, autor sau ISBN, cautarea e bazata pe criterii LIKE,
de exemplu termenul de cautare `genide` va afisa cartile scrise de `Eugenides`;
in plus, utilizatorul poate imprumuta carti (daca sunt exemplare disponibile) si poate viziona lista de carti imprumutate deja

- administratorul poate vizualiza cartile, poate adauga carti, poate cauta dupa aceleasi criterii ca utilizatorul,
vede lista tuturor imprumuturilor (cele ce au depasit data returnarii sunt marcate in tabela cu culoare rosie), 
poate adauga/edita/sterge utilizatori

- exista un formular de inregistrare standard, bazat pe nume, email si parola, aceasta din urma fiind `hashed` 
la salvarea in baza de date, pentru extra securitate

###Tehnologii utilizare

- PHP 7.1
- MySQL
- Bootstrap 4 beta
- jQuery - pentru AJAX calls
- toastr.js - pentru notificari de tip toastr (temporare)
