import * as console from 'console';
import { Directive, ElementRef, Renderer2, OnInit, Input } from '@angular/core';

@Directive({
  selector: '[appDirectivatres]'
})
export class DirectivatresDirective {
  @Input() appDirectivatres : string;
  //@Input('appDirectivatres') color: string;

  constructor(private obj: ElementRef, private renderizador: Renderer2) {
  }
  ngOnInit(): void {

    this.renderizador.setProperty(this.obj.nativeElement, 'textContent', 'prueba');
    this.renderizador.setStyle(this.obj.nativeElement, 'backgroundColor', this.appDirectivatres == null ? 'pink' : this.appDirectivatres);


  }
}
