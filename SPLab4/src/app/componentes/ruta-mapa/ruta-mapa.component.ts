import { Component, OnInit ,Directive, ElementRef, Renderer2, Input, OnDestroy,ViewChild,NgZone} from '@angular/core';
import { Validators, FormBuilder, FormControl, FormGroup } from '@angular/forms';
import {  MapsAPILoader, GoogleMapsAPIWrapper } from 'angular2-google-maps/core';
import { GoogleMapDirective } from '../../directivas/google-map.directive';
declare var google:any;
declare var jQuery:any;
@Component({
  selector: 'app-ruta-mapa',
  templateUrl: './ruta-mapa.component.html',
  styleUrls: ['./ruta-mapa.component.css']
})
export class RutaMapaComponent implements OnInit {
  public latitude: number;
  public longitude: number;
  public destinationInput: FormControl;
  public destinationOutput: FormControl;
  public zoom: number;
  public iconurl: string;
  public mapCustomStyles : any;
  public estimatedTime: any;
  public estimatedDistance: any;
  @ViewChild("pickupInput")
  public pickupInputElementRef: ElementRef;

   @ViewChild("pickupOutput")
  public pickupOutputElementRef: ElementRef;

   @ViewChild("scrollMe")
  private scrollContainer: ElementRef;

  @ViewChild(GoogleMapDirective) vc: GoogleMapDirective;

  public origin :any ; // its a example aleatory position
  public destination : any; // its a example aleatory position
  constructor(
    private mapsAPILoader: MapsAPILoader,
    private ngZone: NgZone,
    private gmapsApi: GoogleMapsAPIWrapper,
    private _elementRef : ElementRef
  ) {
  }
  ngOnInit() {
    //set google maps defaults
    this.zoom = 4;
    this.latitude = 39.8282;
    this.longitude = -98.5795;
    //this.iconurl = '../image/map-icon.png';
    this.iconurl = '../image/map-icon.png';
  
   // this.mapCustomStyles = this.getMapCusotmStyles();
    //create search FormControl
   this.destinationInput = new FormControl();
    this.destinationOutput = new FormControl();
    //set current position
    this.setCurrentPosition();
    
    //load Places Autocomplete
    this.mapsAPILoader.load().then(() => {
        let autocompleteInput = new google.maps.places.Autocomplete(this.pickupInputElementRef.nativeElement, {
          types: ["address"]
        });

        let autocompleteOutput = new google.maps.places.Autocomplete(this.pickupOutputElementRef.nativeElement, {
          types: ["address"]
        });
      
               this.setupPlaceChangedListener(autocompleteInput, 'ORG');
              this.setupPlaceChangedListener(autocompleteOutput, 'DES');
    });
  }
  
  private setupPlaceChangedListener(autocomplete: any, mode: any ) {
  
    autocomplete.addListener("place_changed", () => {
          this.ngZone.run(() => {
            //get the place result
            let place: any= autocomplete.getPlace();
            //verify result
            if (place.geometry === undefined) {
              return;
            }
            if (mode === 'ORG') {
                this.vc.origin = { longitude: place.geometry.location.lng(), latitude: place.geometry.location.lat() }; 
                this.vc.originPlaceId = place.place_id;
            } else {
                this.vc.destination = { longitude: place.geometry.location.lng(), latitude: place.geometry.location.lat() }; // its a example aleatory position
                this.vc.destinationPlaceId = place.place_id;
            }

            if(this.vc.directionsDisplay === undefined){ this.mapsAPILoader.load().then(() => { 
                  this.vc.directionsDisplay = new google.maps.DirectionsRenderer;
                }); 
          }
        
            //Update the directions
            this.vc.updateDirections();
            this.zoom = 12;
          });

       });

  }

  getDistanceAndDuration(){
    this.estimatedTime = this.vc.estimatedTime;
    this.estimatedDistance = this.vc.estimatedDistance;
  }

  scrollToBottom(): void {
    jQuery('html, body').animate({ scrollTop: jQuery(document).height() }, 3000);
  }
  private setPickUpLocation( place:any ) {
    //verify result
          if (place.geometry === undefined || place.geometry === null) {
            return;
          }
          //set latitude, longitude and zoom
          this.latitude = place.geometry.location.lat();
          this.longitude = place.geometry.location.lng();
          this.zoom = 12;
  }

  private setCurrentPosition() {
    if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition((position) => {
        this.latitude = position.coords.latitude;
        this.longitude = position.coords.longitude;
        this.zoom = 12;
      });
    }
  }

  private getMapCusotmStyles() {
    // Write your Google Map Custom Style Code Here.
  }

}