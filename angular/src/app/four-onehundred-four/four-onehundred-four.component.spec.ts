import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FourOnehundredFourComponent } from './four-onehundred-four.component';

describe('FourOnehundredFourComponent', () => {
  let component: FourOnehundredFourComponent;
  let fixture: ComponentFixture<FourOnehundredFourComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FourOnehundredFourComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FourOnehundredFourComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
