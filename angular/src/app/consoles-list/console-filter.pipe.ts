// console-fliter.pipe.ts

import { PipeTransform, Pipe } from '@angular/core';
import { Console } from '../models/Console.model';

@Pipe({
    name: 'consoleFilter'
})
export class ConsoleFilterPipe implements PipeTransform{
    transform(consoles: Console[], searchName: String): Console[] {
        if(!consoles || !searchName){
            return consoles; //
        }

        return consoles.filter(conso => conso.nom.toLowerCase().indexOf(searchName.toLocaleLowerCase()) !== -1);
    }
}