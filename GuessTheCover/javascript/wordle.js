const WORDS = ['Mario', 'Zelda', 'Sonic', 'Pokemon', 'FinalFantasy', 'Minecraft', 'Tetris', 'DonkeyKong', 'PacMan', 'StreetFighter', 'ResidentEvil', 'AssassinsCreed', 'MetalGear', 'KingdomHearts', 'CallOfDuty', 'Halo', 'GearsOfWar', 'Uncharted', 'GodOfWar', 'TheLastOfUs', 'Bloodborne', 'DarkSouls', 'Skyrim', 'Fallout', 'MassEffect', 'Bioshock', 'Portal', 'HalfLife', 'TeamFortress', 'Overwatch', 'Fortnite', 'LeagueOfLegends', 'WorldOfWarcraft', 'Diablo', 'Starcraft', 'Warcraft', 'Civilization', 'SimCity', 'AgeOfEmpires', 'CommandAndConquer', 'Myst', 'TombRaider', 'DeusEx', 'MaxPayne', 'GrandTheftAuto', 'RedDeadRedemption', 'Bully', 'Fable', 'Forza', 'NeedForSpeed', 'Burnout', 'GranTurismo', 'ProjectCars', 'Tekken', 'DeadOrAlive', 'VirtuaFighter', 'MortalKombat', 'MarvelVsCapcom', 'SuperSmashBros', 'KingOfFighters', 'BubbleBobble', 'PuzzleBobble', 'AngryBirds', 'FruitNinja', 'CutTheRope', 'PlantsVsZombies', 'CandyCrush', 'Bejeweled', 'Peggle', 'Mahjong', 'Solitaire', 'Minesweeper', 'Chess', 'Go', 'Scrabble', 'Boggle', 'TrivialPursuit', 'Risk', 'Monopoly', 'Clue', 'Operation', 'Battleship', 'ConnectFour', 'Jenga', 'Twister', 'Uno', 'MagicTheGathering', 'YuGiOh', 'PokemonTCG', 'SuperMarioBros', 'TheLegendofZelda', 'PacMan', 'Minecraft', 'Tetris', 'Fortnite', 'Overwatch', 'LeagueofLegends', 'WorldofWarcraft', 'Starcraft', 'CounterStrike', 'HalfLife', 'Doom', 'AssassinsCreed', 'MetalGearSolid', 'GrandTheftAuto', 'Fallout', 'Skyrim', 'ResidentEvil', 'SilentHill', 'Bioshock', 'MassEffect', 'Halo', 'Uncharted', 'TheLastofUs', 'GodofWar', 'HorizonZeroDawn', 'FinalFantasy', 'KingdomHearts', 'Persona', 'DevilMayCry', 'Bayonetta', 'DarkSouls', 'Bloodborne', 'Sekiro', 'Nioh', 'Castlevania', 'Megaman', 'SonictheHedgehog', 'StreetFighter', 'MortalKombat', 'Tekken', 'SoulCalibur', 'KingofFighters', 'GuiltyGear', 'DeadorAlive', 'FireEmblem', 'Pokémon', 'AnimalCrossing', 'Kirby', 'DonkeyKong', 'BanjoKazooie', 'CrashBandicoot', 'SpyrotheDragon', 'Rayman', 'PrinceofPersia', 'TombRaider', 'CommanderKeen', 'DeusEx', 'Thief', 'SystemShock', 'Diablo', 'Starcraft', 'Warcraft', 'CommandandConquer', 'AgeofEmpires', 'Civilization', 'SimCity', 'TheSims', 'Myst', 'Riven', 'Portal', 'HalfLife2', 'TeamFortress2', 'Left4Dead', 'DeadSpace', 'BioShockInfinite', 'Braid', 'Limbo', 'Journey', 'Flower', 'Fez', 'Transistor', 'Bastion', 'HotlineMiami', 'Undertale', 'Cuphead', 'Inside', 'LittleNightmares', 'Celeste', 'HollowKnight', 'StardewValley', 'MinecraftDungeons'];

const WORD_LENGTH = 5; // Longitud de la palabra a adivinar
const MAX_GUESSES = 10; // Número máximo de intentos
let word; // Palabra a adivinar
let letters; // Letras de la palabra a adivinar
let guesses = []; // Letras adivinadas
let remainingGuesses; // Número de intentos restantes

// Función para obtener una palabra aleatoria del array WORDS
function getRandomWord() {
  const randomIndex = Math.floor(Math.random() * WORDS.length);
  return WORDS[randomIndex];
}

// Función para inicializar el juego
const newWordleButton = document.querySelector('#new-wordle-button');
newWordleButton.addEventListener('click', () => {
  init();
});

// Función para inicializar el juego
function init() {
  word = getRandomWord();
  letters = word.split('');
  guesses = [];
  remainingGuesses = MAX_GUESSES;
  renderWordle();
}

// Función para renderizar el juego
function renderWordle() {
  const wordleContainer = d3.select('#wordle');
  wordleContainer.selectAll('*').remove();
  wordleContainer.append('p')
    .text(`Adivina la palabra:`);
  const letterContainer = wordleContainer.append('div')
    .attr('class', 'letter-container');
  letters.forEach((letter, index) => {
    if (letter === " ") { // Ignorar los espacios en blanco
      letterContainer.append('span').text(" ");
    } else {
      const letterDiv = letterContainer.append('div')
        .attr('class', 'letter');
      letterDiv.append('span')
        .attr('class', 'letter-text')
        .text(guesses.includes(letter.toLowerCase()) ? letter : '_');
    }
  });
  const guessContainer = wordleContainer.append('div')
    .attr('class', 'guess-container');
  for (let i = 0; i < 26; i++) {
    const letter = String.fromCharCode(65 + i);
    const button = guessContainer.append('button')
      .attr('class', 'guess-button')
      .text(letter)
      .on('click', () => {
        if (guesses.includes(letter.toLowerCase()) || guesses.includes(letter.toUpperCase())) {
          return;
        }
        guesses.push(letter.toLowerCase());
        if (letters.includes(letter.toLowerCase())) {
          const allLettersGuessed = letters.every(letter => guesses.includes(letter.toLowerCase()));
          if (allLettersGuessed) {
            wordleContainer.html(`
            <p class="acertaste">Enhorabuena, acertaste el juego</p>
            `);
                      wordleContainer.select(".acertaste").style("color", "lime");
                      return;
          }
        } else {
          remainingGuesses--;
          if (remainingGuesses === 0) {
            wordleContainer.html(`
    <p class="gameover">GAME OVER. El era ${word}.</p>
  `);
            wordleContainer.select(".gameover").style("color", "red");
            return;
          }
        }
        renderWordle();
      });
  }
  wordleContainer.append('p')
    .text(`Intentos restantes: ${remainingGuesses}`);
}
// Función

window.addEventListener('load', () => {
  init();
});