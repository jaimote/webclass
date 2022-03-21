<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;


class StudentController extends Controller
{
    public function getAllBySchoolID(Request $request)
    {
        try {
            $students = Student::where([
                ['colegio', $request->schoolID],
                ['estado', 1],
                ['habilitado', 1],
            ])->get();

            if (is_null($students) || !$students->count()) {
                throw new ModelNotFoundException();
            }
            return response()->json(
                [
                    'status' => 'SUCCESS',
                    'data' => [
                        'users' => $students
                    ],
                    'code' => HttpFoundationResponse::HTTP_OK
                ],
                HttpFoundationResponse::HTTP_OK
            );
        } catch (\Throwable $th) {
            if ($th instanceof ModelNotFoundException) {
                return response()->json(
                    [
                        'status' => 'ERROR',
                        'message' => 'RECURSO NO ENCONTRADO.',
                        'code' => HttpFoundationResponse::HTTP_NOT_FOUND,
                    ],
                    HttpFoundationResponse::HTTP_NOT_FOUND
                );
            } else {
                return response()->json(
                    [
                        'status' => 'ERROR',
                        'message' => $th->getMessage(),
                        'code' => $th->getCode(),
                        'trace' => $th->getTrace()
                    ],
                    HttpFoundationResponse::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }
    }

    public function getStudentByID(Request $request)
    {
        try {
            $students = Student::findOrFail($request->studentID);

            if (is_null($students) || !$students->count()) {
                throw new ModelNotFoundException();
            }
            return response()->json(
                [
                    'status' => 'SUCCESS',
                    'data' => [
                        'users' => $students
                    ],
                    'code' => HttpFoundationResponse::HTTP_OK
                ],
                HttpFoundationResponse::HTTP_OK
            );
        } catch (\Throwable $th) {
            if ($th instanceof ModelNotFoundException) {
                return response()->json(
                    [
                        'status' => 'ERROR',
                        'message' => 'RECURSO NO ENCONTRADO.',
                        'code' => HttpFoundationResponse::HTTP_NOT_FOUND,
                    ],
                    HttpFoundationResponse::HTTP_NOT_FOUND
                );
            } else {
                return response()->json(
                    [
                        'status' => 'ERROR',
                        'message' => $th->getMessage(),
                        'code' => $th->getCode(),
                        'trace' => $th->getTrace()
                    ],
                    HttpFoundationResponse::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }
    }
}
