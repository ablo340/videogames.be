// game-filter.pipe.ts
import { PipeTransform, Pipe } from '@angular/core';
import { Game } from '../models/Game.model';

@Pipe({
    name: 'gameFilter'
})
export class GameFilterPipe implements PipeTransform{
    transform(games: Game[], searchName: String): Game[] {
        if(!games || !searchName){
            return games;
        }

        return games.filter(game => game.nom.toLowerCase().indexOf(searchName.toLocaleLowerCase()) !== -1);
    }
}