import { TestBed } from '@angular/core/testing';

import { ServLaravelService } from './serv-laravel.service';

describe('ServLaravelService', () => {
  let service: ServLaravelService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ServLaravelService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
