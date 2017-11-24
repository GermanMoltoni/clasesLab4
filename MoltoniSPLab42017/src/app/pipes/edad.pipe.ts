import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'edad'
})
export class EdadPipe implements PipeTransform {

  transform(value: any, args?: any): any {
    if(value  < 30)
      return "Joven"
    else if(value  > 30 &&value < 40)
      return "Adulto"
    else if(value > 40 &&value < 60)
      return "Casi Jubilado"
  }

}
