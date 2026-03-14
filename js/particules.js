/*********************************************************
Fichier JS gérant l'effet de particules interactives (Canvas)
Gère l'affichage d'une grille de symboles avec effet de loupe
*********************************************************/

let canvas = document.querySelector('.section-accueil_particules') || document.querySelector('#canvasParticules');
let accueil = document.querySelector('.section-accueil') || document.querySelector('.panel-image');
let ctx = canvas.getContext('2d');
let largeur, hauteur;

const style = getComputedStyle(document.body);

// conversion des couleurs hexadécimales en rgb pour la gestion de l'opacité
function hexToRgb(hex) {
    hex = hex.trim().replace(/^#/, '');
    if (hex.length === 3) {
        hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
    }
    const bigint = parseInt(hex, 16);
    return `${(bigint >> 16) & 255}, ${(bigint >> 8) & 255}, ${bigint & 255}`;
}

let c_bg, c_hidden, c_reveal, c_glow, c_rouge_rgb;

// synchronisation des couleurs du canvas avec les variables css du site
function updateColors() {
    let rawFond = style.getPropertyValue('--fond').trim() || '#211416';
    let rawRouge = style.getPropertyValue('--rouge').trim() || '#BD2734';
    let rawTexte = style.getPropertyValue('--texte').trim() || '#F7F8F9';

    c_rouge_rgb = hexToRgb(rawRouge);
    c_bg = rawFond;
    c_hidden = `rgba(${c_rouge_rgb}, 0.15)`;
    c_reveal = rawTexte;
    c_glow = `rgba(${c_rouge_rgb}, 0.3)`;
}

updateColors();

// etat de la souris et rayon d'action de l'effet de revelateur
let mouse = {
    x: -1000,
    y: -1000,
    radius: 180
};

// suivi de la position de la souris par rapport au conteneur
window.addEventListener('mousemove', function (event) {
    const rect = accueil.getBoundingClientRect();
    mouse.x = event.clientX - rect.left;
    mouse.y = event.clientY - rect.top;
});

// reset de la position quand la souris quitte la zone
window.addEventListener('mouseout', function () {
    mouse.x = -1000;
    mouse.y = -1000;
});

// recalcule de la grille et des dimensions lors du redimensionnement
window.addEventListener('resize', () => {
    affichage();
    initGrid();
    updateColors();
});

// adaptation de la résolution du canvas au ratio de pixels de l'écran
function affichage() {
    largeur = accueil.clientWidth;
    hauteur = accueil.clientHeight;

    const dpr = window.devicePixelRatio || 1;
    canvas.width = largeur * dpr;
    canvas.height = hauteur * dpr;
    ctx.scale(dpr, dpr);
    canvas.style.width = `${largeur}px`;
    canvas.style.height = `${hauteur}px`;
}

const cryptoChars = "0123456789ABCDEF@#$%&*{[}]/\\<>+=".split('');

// definition de chaque cellule de la grille cryptographique
class SecretCell {
    constructor(x, y, size) {
        this.x = x;
        this.y = y;
        this.size = size;
        this.motif = Math.random() > 0.5 ? 0 : 1;
        this.cryptoChar = cryptoChars[Math.floor(Math.random() * cryptoChars.length)];
        this.timer = Math.random() * 100;
    }

    // mise a jour aleatoire du caractere affiche
    update() {
        this.timer++;
        if (this.timer > 20 && Math.random() < 0.05) {
            this.cryptoChar = cryptoChars[Math.floor(Math.random() * cryptoChars.length)];
            this.timer = 0;
        }
    }

    // rendu visuel de la cellule (icone cadenas ou caractere revele)
    draw(ctx, distanceToMouse) {
        let isRevealed = distanceToMouse < mouse.radius;

        ctx.save();
        ctx.translate(this.x, this.y);

        if (!isRevealed) {
            // dessin des icones discretes quand la souris est loin
            ctx.strokeStyle = c_hidden;
            ctx.fillStyle = c_hidden;
            ctx.lineWidth = 1.5;

            if (this.motif === 0) {
                // dessin du cadenas
                ctx.beginPath();
                ctx.roundRect(-4, -2, 8, 7, 2);
                ctx.fill();
                ctx.beginPath();
                ctx.arc(0, -2, 3, Math.PI, 0);
                ctx.stroke();
            } else {
                // dessin de la clé
                ctx.beginPath();
                ctx.arc(4, 0, 2.5, 0, Math.PI * 2);
                ctx.stroke();
                ctx.beginPath();
                ctx.moveTo(1.5, 0);
                ctx.lineTo(-5, 0);
                ctx.moveTo(-2, 0);
                ctx.lineTo(-2, 2);
                ctx.moveTo(-4, 0);
                ctx.lineTo(-4, 2);
                ctx.stroke();
            }
        } else {
            // affichage du caractere cryptique avec effet de lueur
            let intensity = 1 - (distanceToMouse / mouse.radius);
            ctx.fillStyle = c_reveal;
            ctx.globalAlpha = intensity;
            ctx.font = `bold ${this.size * 0.6}px 'Montserrat', monospace`;
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.shadowBlur = 8 * intensity;
            ctx.shadowColor = c_reveal;
            ctx.fillText(this.cryptoChar, 0, 0);
        }
        ctx.restore();
    }
}

let grid = [];
const cellSize = 22;

// creation de la grille d'objets sur toute la surface
function initGrid() {
    grid = [];
    let cols = Math.ceil(largeur / cellSize);
    let rows = Math.ceil(hauteur / cellSize);

    let offsetX = (largeur - (cols * cellSize)) / 2 + (cellSize / 2);
    let offsetY = (hauteur - (rows * cellSize)) / 2 + (cellSize / 2);

    for (let r = 0; r < rows; r++) {
        for (let c = 0; c < cols; c++) {
            grid.push(new SecretCell(offsetX + c * cellSize, offsetY + r * cellSize, cellSize));
        }
    }
}

// boucle d'animation principale
function animation() {
    requestAnimationFrame(animation);
    ctx.fillStyle = c_bg;
    ctx.fillRect(0, 0, largeur, hauteur);

    // ajout d'un degradé radial suivant la souris
    if (mouse.x > 0 && mouse.y > 0) {
        let lensGrad = ctx.createRadialGradient(mouse.x, mouse.y, 0, mouse.x, mouse.y, mouse.radius);
        lensGrad.addColorStop(0, `rgba(${c_rouge_rgb}, 0.18)`);
        lensGrad.addColorStop(0.5, `rgba(${c_rouge_rgb}, 0.05)`);
        lensGrad.addColorStop(1, 'rgba(0, 0, 0, 0)');
        ctx.fillStyle = lensGrad;
        ctx.fillRect(0, 0, largeur, hauteur);

        // cercle de contour de la lentille
        ctx.beginPath();
        ctx.arc(mouse.x, mouse.y, mouse.radius * 0.95, 0, Math.PI * 2);
        ctx.strokeStyle = `rgba(${c_rouge_rgb}, 0.25)`;
        ctx.lineWidth = 1;
        ctx.stroke();
    }

    // calcul et rendu de chaque cellule individuelle
    for (let i = 0; i < grid.length; i++) {
        let cell = grid[i];
        cell.update();

        let distanceToMouse = 9999;
        if (mouse.x > 0 && mouse.y > 0) {
            let dx = mouse.x - cell.x;
            let dy = mouse.y - cell.y;
            distanceToMouse = Math.sqrt(dx * dx + dy * dy);
        }
        cell.draw(ctx, distanceToMouse);
    }
}

// lancement initial
affichage();
initGrid();
animation();