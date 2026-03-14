/*********************************************************
Fichier JS gérant le formulaire de réservation complexe
Gère le calcul du prix dynamique, les options et le calendrier
*********************************************************/

document.addEventListener('DOMContentLoaded', () => {
    // verification de la presence du formulaire avant execution
    const formReservation = document.querySelector('.form-reservation');
    if (!formReservation) return;

    // recuperation des constantes de tarification via les attributs data
    const unitPrice = parseFloat(formReservation.getAttribute('data-prix')) || 0;
    const maxPlayers = parseInt(formReservation.getAttribute('data-max-joueurs')) || 8;
    let currentPlayers = 1;

    // selection des elements de l'interface de calcul
    const btnMinus = document.querySelector('.btn-minus');
    const btnPlus = document.querySelector('.btn-plus');
    const displayNbJoueurs = document.querySelector('.display-nb-joueurs');
    const inputNbJoueurs = document.querySelector('.input-nb-joueurs');
    const playerBtns = document.querySelectorAll('.btn-player-num');
    const calcFormula = document.querySelector('.calc-formula');
    const calcTotalTop = document.querySelector('.calc-total-top');
    const resumeJoueurs = document.querySelector('.resume-joueurs');
    const resumePrix = document.querySelector('.resume-prix');

    const selectGameplay = document.getElementById('select-gameplay');
    const inputObjetsQty = document.querySelectorAll('.input-objet-qty');

    const selectLieu = document.getElementById('select-lieu');
    const inputNomVille = document.getElementById('input-nom-ville');
    const resumeVille = document.querySelector('.resume-ville');

    function initCustomDropdown(dropdownId, triggerId, inputId, onChangeCallback) {
        const dropdown = document.getElementById(dropdownId);
        const trigger = document.getElementById(triggerId);
        const input = document.getElementById(inputId);
        if (!dropdown || !trigger || !input) return;

        const options = dropdown.querySelectorAll('.custom-option');

        trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            document.querySelectorAll('.custom-select-wrapper').forEach(d => {
                if (d !== dropdown) d.classList.remove('open');
            });
            dropdown.classList.toggle('open');
        });

        options.forEach(opt => {
            opt.addEventListener('click', (e) => {
                e.stopPropagation();
                dropdown.classList.remove('open');
                
                const text = opt.getAttribute('data-text') || opt.textContent.trim();
                trigger.textContent = text;
                trigger.classList.add('selected');
                input.value = opt.getAttribute('data-value');
                input.dispatchEvent(new Event('change'));

                options.forEach(o => o.classList.remove('checked'));
                opt.classList.add('checked');

                if (onChangeCallback) onChangeCallback(opt);
            });
        });
    }

    document.addEventListener('click', () => {
        document.querySelectorAll('.custom-select-wrapper.open').forEach(d => {
            d.classList.remove('open');
        });
    });

    initCustomDropdown('lieu-dropdown', 'lieu-trigger', 'select-lieu', (opt) => {
        const text = opt.getAttribute('data-text') || opt.textContent.trim();
        if (inputNomVille) inputNomVille.value = text;
        if (resumeVille) resumeVille.innerText = text;
    });

    initCustomDropdown('gameplay-dropdown', 'gameplay-trigger', 'select-gameplay', (opt) => {
        updateUI(currentPlayers);
    });

    function calculateTotal() {
        let total = currentPlayers * unitPrice;

        const inputGameplay = document.getElementById('select-gameplay');
        if (inputGameplay && inputGameplay.value !== "") {
            const selectedOpt = document.querySelector(`#gameplay-dropdown .custom-option[data-value="${inputGameplay.value}"]`);
            if (selectedOpt) {
                const prixGameplay = parseFloat(selectedOpt.getAttribute('data-prix')) || 0;
                total += prixGameplay;
            }
        }

        inputObjetsQty.forEach(input => {
            const qty = parseInt(input.value) || 0;
            const prixObj = parseFloat(input.getAttribute('data-prix')) || 0;
            total += (qty * prixObj);
        });

        return total;
    }

    // mise a jour globale de l'interface utilisateur (recap et totaux)
    function updateUI(players) {
        if (players < 1) players = 1;
        if (players > maxPlayers) players = maxPlayers;
        currentPlayers = players;

        const total = calculateTotal();
        const formattedPlayers = currentPlayers < 10 ? '0' + currentPlayers : currentPlayers;

        // actualisation des libelles et des champs caches
        if (displayNbJoueurs) displayNbJoueurs.textContent = formattedPlayers;
        if (inputNbJoueurs) inputNbJoueurs.value = currentPlayers;
        if (calcFormula) calcFormula.textContent = currentPlayers + 'X' + unitPrice + '€';
        if (calcTotalTop) calcTotalTop.textContent = total.toFixed(2) + '€';
        if (resumeJoueurs) resumeJoueurs.textContent = currentPlayers + (currentPlayers > 1 ? ' joueurs' : ' joueur');
        if (resumePrix) resumePrix.textContent = total.toFixed(2) + '€';

        // gestion de l'etat actif sur les boutons de selection rapide
        playerBtns.forEach(btn => {
            if (parseInt(btn.getAttribute('data-val')) === currentPlayers) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    }

    // --- ÉCOUTEURS D'ÉVÉNEMENTS POUR LE PRIX ---

    const btnQtyPlus = document.querySelectorAll('.btn-qty-plus');
    const btnQtyMinus = document.querySelectorAll('.btn-qty-minus');

    btnQtyPlus.forEach(btn => {
        btn.addEventListener('click', function() {
            const container = this.closest('.equipement-qty-ctrl');
            const input = container.querySelector('.inner-qty-input');
            const display = container.querySelector('.qty-display');
            
            let val = parseInt(input.value) || 0;
            val++;
            input.value = val;
            display.textContent = val;
            
            updateUI(currentPlayers);
        });
    });

    btnQtyMinus.forEach(btn => {
        btn.addEventListener('click', function() {
            const container = this.closest('.equipement-qty-ctrl');
            const input = container.querySelector('.inner-qty-input');
            const display = container.querySelector('.qty-display');
            
            let val = parseInt(input.value) || 0;
            if (val > 0) {
                val--;
                input.value = val;
                display.textContent = val;
                updateUI(currentPlayers);
            }
        });
    });

    inputObjetsQty.forEach(input => {
        input.addEventListener('input', () => {
            if (input.value < 0) input.value = 0; // securite contre les nombres negatifs
            updateUI(currentPlayers);
        });
    });

    // gestionnaires de clic pour l'incrementation du nombre de participants
    if (btnMinus) {
        btnMinus.addEventListener('click', () => {
            if (currentPlayers > 1) updateUI(currentPlayers - 1);
        });
    }

    if (btnPlus) {
        btnPlus.addEventListener('click', () => {
            if (currentPlayers < maxPlayers) updateUI(currentPlayers + 1);
        });
    }

    playerBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const val = parseInt(this.getAttribute('data-val'));
            updateUI(val);
        });
    });

    // --- LOGIQUE DU CALENDRIER CUSTOM ---
    const btnHoraires = document.querySelectorAll('.btn-horaire');
    const inputHeure = document.querySelector('.input-heure');
    const resumeHeure = document.querySelector('.resume-heure');
    const btnSubmit = document.querySelector('.btn-reserver');
    const calendarDaysContainer = document.getElementById('calendar-days-container');
    const calendarMonthYear = document.querySelector('.calendar-month-year');
    const btnCalPrev = document.querySelector('.btn-cal-prev');
    const btnCalNext = document.querySelector('.btn-cal-next');

    let currentDate = new Date(); // Today
    let displayMonth = currentDate.getMonth();
    let displayYear = currentDate.getFullYear();
    
    let selectedDateInfo = null; // { year, month, day }
    let selectedTime = null;

    const moisFrancais = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    function renderCalendar() {
        if (!calendarDaysContainer) return;

        calendarMonthYear.textContent = `${moisFrancais[displayMonth]} ${displayYear}`;

        const existingDays = calendarDaysContainer.querySelectorAll('.cal-day');
        existingDays.forEach(day => day.remove());

        let firstDay = new Date(displayYear, displayMonth, 1).getDay();
        firstDay = firstDay === 0 ? 6 : firstDay - 1;

        const daysInMonth = new Date(displayYear, displayMonth + 1, 0).getDate();
        const daysInPrevMonth = new Date(displayYear, displayMonth, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'cal-day empty disabled';
            btn.textContent = daysInPrevMonth - firstDay + i + 1;
            calendarDaysContainer.appendChild(btn);
        }

        const today = new Date();
        today.setHours(0, 0, 0, 0);

        for (let i = 1; i <= daysInMonth; i++) {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'cal-day';
            btn.textContent = i;

            const iterDate = new Date(displayYear, displayMonth, i);
            iterDate.setHours(0, 0, 0, 0);

            if (iterDate < today) {
                btn.classList.add('disabled');
                btn.style.opacity = '0.3';
                btn.style.cursor = 'not-allowed';
            } else {
                if (selectedDateInfo && 
                    selectedDateInfo.year === displayYear && 
                    selectedDateInfo.month === displayMonth && 
                    selectedDateInfo.day === i) {
                    btn.classList.add('active');
                }

                btn.addEventListener('click', function() {
                    const allDays = calendarDaysContainer.querySelectorAll('.cal-day:not(.empty)');
                    allDays.forEach(d => d.classList.remove('active'));
                    this.classList.add('active');
                    
                    selectedDateInfo = {
                        year: displayYear,
                        month: displayMonth,
                        day: i
                    };
                    checkReservationState();
                });
            }

            calendarDaysContainer.appendChild(btn);
        }

        const totalCells = firstDay + daysInMonth;
        const remainingCells = 42 - totalCells;
        
        for (let i = 1; i <= remainingCells; i++) {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'cal-day empty disabled';
            btn.textContent = i;
            calendarDaysContainer.appendChild(btn);
        }
    }

    if (btnCalPrev) {
        btnCalPrev.addEventListener('click', () => {
            displayMonth--;
            if (displayMonth < 0) {
                displayMonth = 11;
                displayYear--;
            }
            renderCalendar();
        });
    }

    if (btnCalNext) {
        btnCalNext.addEventListener('click', () => {
            displayMonth++;
            if (displayMonth > 11) {
                displayMonth = 0;
                displayYear++;
            }
            renderCalendar();
        });
    }

    function checkReservationState() {
        if (selectedDateInfo && selectedTime) {
            const displayMonthStr = moisFrancais[selectedDateInfo.month];
            const dateStr = `${selectedDateInfo.day} ${displayMonthStr} ${selectedDateInfo.year} à ${selectedTime}`;
            if (resumeHeure) resumeHeure.innerText = ' le ' + dateStr;
            
            // Format for database: YYYY-MM-DD HH:mm:00
            const sqlMonth = (selectedDateInfo.month + 1).toString().padStart(2, '0');
            const sqlDay = selectedDateInfo.day.toString().padStart(2, '0');
            const sqlDateTime = `${selectedDateInfo.year}-${sqlMonth}-${sqlDay} ${selectedTime}:00`;
            
            if (inputHeure) inputHeure.value = sqlDateTime;

            if (btnSubmit) {
                btnSubmit.disabled = false;
                btnSubmit.style.opacity = '1';
                btnSubmit.style.cursor = 'pointer';
            }
        } else {
            if (btnSubmit) {
                btnSubmit.disabled = true;
                btnSubmit.style.opacity = '0.5';
                btnSubmit.style.cursor = 'not-allowed';
            }
        }
    }

    btnHoraires.forEach(btn => {
        btn.addEventListener('click', function() {
            btnHoraires.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            selectedTime = this.textContent.trim();
            checkReservationState();
        });
    });

    renderCalendar();
});