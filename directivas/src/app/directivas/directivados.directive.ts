import { Directive, ElementRef, Renderer2 } from '@angular/core';

@Directive({
  selector: '[appDirectivados]'
})
export class DirectivadosDirective {

  constructor(private obj: ElementRef, private renderizador: Renderer2) {
    this.renderizador.setStyle(this.obj.nativeElement, 'backgroundColor', 'yellow');
  }
}
