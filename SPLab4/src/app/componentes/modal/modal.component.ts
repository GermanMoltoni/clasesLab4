import { Component, OnInit,Inject,Output,EventEmitter } from '@angular/core';
import {MAT_DIALOG_DATA} from '@angular/material';
import {Persona} from '../../clases/persona';
@Component({
  selector: 'app-modal',
  templateUrl: './modal.component.html',
  styleUrls: ['./modal.component.css']
})
export class ModalComponent implements OnInit {
@Output() persona:EventEmitter<Persona> = new EventEmitter<Persona>();
  constructor(@Inject(MAT_DIALOG_DATA) public data: any) { 
  }
  
  ngOnInit() {
  }
  modificar(){
    this.persona.emit();
  }
}
