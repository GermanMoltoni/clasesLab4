import { Directive, ElementRef, Renderer2, OnInit, Input } from '@angular/core';

@Directive({
  selector: '[appTipo]'
})
export class TipoDirective {
  @Input('appTipo') tipo : string;
  
  constructor(private obj: ElementRef, private renderizador: Renderer2) {}
    ngOnInit(): void {
        if(this.tipo == 'jefe'){
          this.renderizador.setStyle(this.obj.nativeElement, 'font-family', 'Georgia');
          
          this.renderizador.setStyle(this.obj.nativeElement, 'backgroundColor', 'pink');
          
        }
      
      
        }    
}
